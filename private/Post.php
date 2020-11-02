<?php
require_once('database.php');
require_once("cleaninput.php");
require_once('FriendManager.php');

class PostManager{
private  $privacy= 2; //public=1;friend=2;
private  $caption="";
private  $photo="";
private  $pdate;
private  $ptime;
private  $postId;
private  $createrId;
  function __construct($creater)
  {
   date_default_timezone_set("Asia/Kolkata");
  $this->createrId=$creater;  
  
  $this->photo="NA.jpg";
  $this->privacy="friends";
  $this->connect(); 
  
  }
 function ini($caption, $images, $prvcy) 
 
 {
   $this->caption=$caption;
   if(isset($images)&&$images!="")
   $this->photo=$images;
   if(isset($prvcy)&&$prvcy!="")
   $this->privacy=$prvcy;
   
 }
  function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');
$this->getTable();
}
  function getTable()
  {
  $q1="CREATE TABLE posts(postId SERIAL,
  createrId BIGINT, pdate DATE, ptime TIME, privacy VARCHAR(20) DEFAULT 'friends' ,caption VARCHAR(50),image1 VARCHAR(50) DEFAULT 'NA.jpg' NOT NULL,PRIMARY KEY(postId) );"; 
  return mysqli_query($this->conn, $q1);
  }
  function createPost()
  {
    $this->pdate=date("Y-m-d");
  $this->ptime=date("h:i:s"); 
   $q1="INSERT INTO posts (createrId, pdate, ptime,privacy, caption, image1) VALUES ($this->createrId, '$this->pdate' ,'$this->ptime', '$this->privacy' , '$this->caption' , '$this->photo' ) ;" ;
 //  var_dump($q1);
  return mysqli_query($this->conn, $q1) ;
   
   
  }
  function EditPost($pid,$cname, $value)
  {
  $q="UPDATE posts set $cname ='$value'; ";  
  }
  function DeletePost($pid)
  {
   $q="DELETE FROM posts where postId =$pid AND createrId=$this->createrId;" ;
   var_dump(mysqli_query($this->conn, $q)) ;
   
   
   
   
  }
function  getPostOfUser($cid)
  {
  $m=new FriendManager($this->createrId);
  $bi=$m->getPublicInfo($cid);
 // var_dump($bi);
  $q1="SELECT * FROM posts where createrId = $cid ORDER BY RAND() LIMIT 1;";
  
 $res= mysqli_query($this->conn, $q1) ; 
// $temp=Array();
 for($i=0;$i<$res->num_rows;$i++)
 {
 $res->data_seek($i);
 $temp[]=$res->fetch_assoc();
 }
 $bundle['info']['name']=$bi['name'];
 $bundle['info']['uid']=$bi['uid'];
 $bundle['info']['pphoto']=$bi['prophoto'];
 $bundle['posts']=$temp;
 if(isset($temp))
 return $bundle;
 else return NULL;
  }
  
 function formateAndEcho($Myarray) 
 {
 header("Content-Type:text/xml");  
 echo "<posts>";
 foreach($Myarray as $post)
 if(isset($post))
 foreach ($post['posts'] as $temp)
 {
 echo <<<EOF
 <post id="{$temp['postId']}">
  <by>{$post['info']['name']}</by>
    <uid>{$post['info']['uid']}</uid>
    <pphoto>{$post['info']['pphoto']}</pphoto>
 <date>{$temp['pdate']}</date>
 <time>{$temp['ptime']}</time>
 <caption>{$temp['caption']}</caption><image>{$temp['image1']}</image>
 <privacy>{$temp['privacy']}</privacy>
 </post>
 EOF;
 }
 
 echo "</posts>";  
  
 }
 
  
}


//$po=new PostManager(2);
//$po->ini("hello", "world", "public");
//$po->createPost();
//var_dump($po->getPostOfUser(1));
//$po->DeletePost(3);
//$po->formateAndEcho($po->getPostOfUser(1));
?>