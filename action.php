<?php SESSION_START();
require_once('private/user.php');
require_once('private/ChatManager.php');
require_once('private/FriendManager.php');
require_once('private/cleaninput.php');

$_SESSION['user']= unserialize(serialize($_SESSION['user']));
$_SESSION['ChatManager']= unserialize(serialize($_SESSION['ChatManager']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));


$FriendMan=new FriendManager ($_SESSION['user']->uid);  

if(isset($_GET['id'])&&is_numeric($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_GET['action']))
{
if($_GET['action']=="Addfriend")  
{
 if($FriendMan->SendRequest($id)) 
 echo "OK";
 
}
else if($_GET['action']=="AcceptRequest")  
{
 if($FriendMan->AcceptRequest($id)) 
 echo "OK";
 
} 
else if($_GET['action']=="DeleteRequest")  
{
 if($FriendMan->DeleteRequest($id)) 
 echo "OK";
 
} 
 
 
 
 
}



if(isset($_POST['text'])&&isclean($_POST['clean']))
{
 $_SESSION['ChatManager']->connect();
 if($_SESSION['ChatManager']->sendMessage($_POST['text']))
echo "SUCCESS";
else echo "ERROR";
}
else echo "ERROR";
?>