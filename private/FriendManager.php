<?php
require_once("database.php");
require_once("Aduser.php");
class FriendManager{
 private $uid;
  function __construct($uid)
  {
  $this->connect() ;
  $this->uid=$uid;
  $this->getTable() ;
  }
 function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

} 
  
  function getTable()
  {
  $q1="CREATE TABLE IF NOT EXISTS friends (senderid BIGINT, receiverid BIGINT, requeststatus BOOLEAN) ;" ; 
  return mysqli_query($this->conn,$q1);
    
  }
  
  function SendRequest($to)
  {
   $q1="INSERT INTO friends (senderid, receiverid, requeststatus) VALUES($this->uid, $to, false) ;" ;
    return mysqli_query($this->conn,$q1);
  }
  
  function AcceptRequest($sender)
  {
  $q1="UPDATE friends set requeststatus = true where senderid=$sender AND receiverid = $this->uid;" ; 
  return mysqli_query($this->conn,$q1);  
  }
  
  function DeleteRequest($sender)
  {
    $q1="DELETE FROM friends where senderid=$sender AND receiverid = $this->uid;" ; 
  return mysqli_query($this->conn,$q1);  
  }
  
  function getAllSuggestions()
  {
   $q1="SELECT uid, name from info where uid NOT in (SELECT senderid from friends where receiverid =$this->uid UNION SELECT receiverid from friends where senderid =$this->uid) AND uid!=$this->uid;" ;
  // var_dump($q1);
  $result = mysqli_query($this->conn,$q1); 
  $arr=Array();
if($result->num_rows!=0)
 {
 for($i=0;$i<$result->num_rows;$i++)
 {
 $result->data_seek($i);
 $arr[]=$result->fetch_assoc();
 }
 
 }
return $arr;  
   
  }
  
  
  function getAllRequests()
  {
 $q1="SELECT uid, name FROM info where uid  in (SELECT DISTINCT senderid FROM friends where receiverid=$this->uid AND requeststatus=false) ;" ;
$result = mysqli_query($this->conn,$q1);
//var_dump($q1);
$arr=Array();
if($result->num_rows!=0)
 {
 for($i=0;$i<$result->num_rows;$i++)
 {
 $result->data_seek($i);
 $arr[]=$result->fetch_assoc();
 }
 
 }
return $arr; 
  }
  
  function getAllFriends()
  {
$q1="SELECT uid, name from info where uid in (SELECT senderid from friends where receiverid =$this->uid AND requeststatus =true UNION SELECT receiverid from friends where senderid = $this->uid AND requeststatus =true)AND uid!=$this->uid;" ;

$result = mysqli_query($this->conn,$q1);
//var_dump($q1);
$arr=Array();
if($result->num_rows!=0)
 {
 for($i=0;$i<$result->num_rows;$i++)
 {
 $result->data_seek($i);
 
$arr[] =$result->fetch_assoc();


 }
 
 }
return $arr; 
    
  }
  function formatAndecho ($array)
  {
  header("Content-Type:text/xml");
  echo "<data>";
  
  foreach ($array as $temp)
  {
 
  echo <<<EOF
  <info id ='{$temp['uid']}'>{$temp['name']}</info>
  EOF;
  

  }   
  echo "</data>";  
    
  }
  
 function isFriend($fid){
 
 $q= "SELECT senderid from friends where receiverid =$this->uid AND requeststatus =true AND senderid=$fid UNION SELECT receiverid from friends where senderid = $this->uid AND requeststatus =true AND receiverid=$fid" ;
 $result=mysqli_query($this->conn, $q);
 if($result->num_rows!=0){
   return true;
 }
 else return false;
} 
  
  
function getPublicInfo($id)
{
$Ad1=new Aduser($id);
$temp['uid'] =$id;
$q="SELECT name,age,city,username FROM info where uid = $id";
$res=mysqli_query($this->conn, $q);
if($res->num_rows!=0){
$loaded=$res->fetch_assoc();
//var_dump($loaded) ;
$temp['name']=$loaded['name'] ;
$temp['age']=$loaded['age'] ; 
$temp['city']=$loaded['city'] ;
$temp['username']=$loaded['username'] ; 
} 
$temp['bio']=$Ad1->getDetails("bio" );
$temp['fgames']=$Ad1->getDetails("fgames" );
$temp['prophoto']=$Ad1->getDetails("pphoto" );
return $temp;
}
  
  function status($fid){
 
 $q= "SELECT senderid,requeststatus from friends where receiverid =$this->uid AND senderid=$fid UNION SELECT receiverid, requeststatus from friends where senderid = $this->uid AND receiverid=$fid" ;
 $result=mysqli_query($this->conn, $q);
 if($result->num_rows!=0){
 
 $st=(int)$result->fetch_assoc()['requeststatus'];
//var_dump($st);
if($st==1)
return 1;
else if($st==0) 
return 0;
 }
 else return -1;
} 
  
  
  
  
  
}


//$f=new FriendManager(1);
//var_dump($f->status(9)) ;
//var_dump($f->status(6)) ;
//var_dump($f->status(110)) ;
//var_dump($f->getPublicInfo(1));

//$f->formatAndecho((Array)$f->getAllRequests());
//$f->getAllRequests();
//$f->SendRequest(252);
//$ef=new FriendManager(2);

//$f->SendRequest(3);

//$uf=new FriendManager(3);
//$uf->AcceptRequest(1);
////var_dump($f->getAllSuggestions()) ;
//var_dump($f->getAllFriends()) ;

?>