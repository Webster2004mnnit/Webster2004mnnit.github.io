<?php
require_once("database.php");
require_once("FriendManager.php");
require_once("user.php");
class PostViewer{
private  $createrId;
private  $createrName;
private  $createrPhoto;
private  $postId;
private  $caption;
private  $photos;
private  $pdate;
private  $ptime;
  function __construct($viewerId)
  {
  $this->viewerId=$viewerId; 
  }
  function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

}
  
  
  function loadPostById($id) 
  {
  $q="SELECT * FROM posts where PostId=$id;";
  $this->connect();
  
  $result=mysqli_query($this->conn,$q) ;
 // var_dump($result->fetch_assoc());
  if($result->num_rows!=0)
     
  { $fm=new FriendManager($this->viewerId);
    $temp=$result->fetch_assoc();
    $tinfo=$fm->GetPublicInfo($temp['createrId']);
    $this->createrName=$tinfo['name'];
    $this->createrPhoto=$tinfo['prophoto'];
    $this->createrId=$temp['createrId'];
    $this->postId=$id;
    
    if($temp['privacy']=="public"||$fm->isFriend($temp['createrId'])||$temp['createrId']==$this->viewerId) 
    {
     $this->caption=$temp['caption'];
     $this->photos=$temp['image1'];
     $this->pdate=$temp['pdate'];
     $this->ptime=$temp['ptime'];
     
    }
    else 
    {
         $this->caption="This content is not for you";
         $this->photos="NP.png";
         
    }
  }
  
  
  
  
  }
  function exportInfo()
  {
  return Array($this->postId, $this->createrId,$this->createrName, $this->createrPhoto, $this->caption, $this->photos, $this->pdate, $this->ptime) ; 
    
    
  }
  
  function close()  
  {
  unset($this->db)  ;
 unset($this->conn)  ; 
    
  }
  
}
/*
$pv=new PostViewer(1);
$pv->loadPostById(25);
$pv->close();
var_dump($pv->exportInfo()) ;
*/
?>
