<?php
require_once("FriendManager.php");
require_once("database.php");
class chatManager{
  function __construct($self)
  {
  $this->myId=$self; 
  $this->connect();
  $this->getTable();
  }
  function iniChat($another)
  {
   $fm=new FriendManager($this->myId);
   if($fm->isFriend($another))
   {
   $this->another=$another;
   return true;
  // echo "SUCCESS";
   } 
  else 
  return false;
//   echo "ERROR";
  }
  
  function connect()
{

$this->db = new database();
$this->conn=$this->db->dbconnect('web');

} 
  
  function getTable()
  {
    $q="CREATE TABLE chats ( cid SERIAL, receiver BIGINT, sender BIGINT, chattext VARCHAR(150),chatmedia varchar(50)) ;";
    return mysqli_query($this->conn,$q);
    
  }
  
  function sendMessage($text)
  {
       $q="INSERT INTO chats (receiver, sender, chattext, chatmedia) VALUES($this->another, $this->myId, '$text' , '$media' ) ;";
     //  var_dump($q);
    return mysqli_query($this->conn,$q);
    
  }
  
  function deleteMessage($mid)
  {
       $q="DELETE FROM chats where cid =$mid  AND sender=$this->myId;" ;
     //  var_dump($q);
    return mysqli_query($this->conn,$q);
    
  }
  function getAllMessages()
  {
  $q="SELECT * FROM chats where sender=$this->myId  AND receiver=$this->another UNION SELECT * FROM chats where receiver=$this->myId  AND sender =$this->another ORDER by cid;" ;
  $result= mysqli_query($this->conn,$q);
  $arr= Array();
  for($i=0;$i<$result->num_rows;$i++)
  {
   $result->data_seek($i);
 $arr[]=$result->fetch_assoc();
  }
  
  return $arr;
  
  }
  
  function formateAndEcho($array)
  {
  header("Content-Type:text/xml");
  echo "<chats>";
  foreach ($array as $temp)
  {
  echo <<<EOF
  <chat id="{$temp['cid']}">
  <to>{$temp['receiver']}</to>
  <from>{$temp['sender']}</from>
  <text>{$temp['chattext']}</text>
  <media>{$temp['chatmedia']}</media>
  </chat>
  EOF;
  }
  
  
  echo "</chats>";
    
  }
  
}


/*
$cm=new chatManager(1);
$cm->iniChat(2);
$cm->sendMessage("Hiidddh", "Hello") ;
$cm->deleteMessage(3);
*/
//$temp=$cm->getAllMessages();
//$cm->formateAndEcho($temp);
?>