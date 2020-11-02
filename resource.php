<?php SESSION_START();
require_once('private/user.php');

$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));


require_once("private/friendManager.php");
$_SESSION['friendMan']=new FriendManager ($_SESSION['user']->uid);
if(isset($_GET['suggestions'])&&$_GET['suggestions']==1)
{$arr=$_SESSION['friendMan']->getAllSuggestions();
} 
else if(isset($_GET['requests'])&&$_GET['requests']==1)
{$arr=$_SESSION['friendMan']->getAllRequests();
} 

else if(isset($_GET['friends'])&&$_GET['friends']==1)
{$arr=$_SESSION['friendMan']->getAllFriends();
} 





if(isset($arr))
$_SESSION['friendMan']->formatAndecho($arr);
else die(header("Location:"."HomeUser.php"));



//var_dump($_SESSION['user']->isloggedin());
?>
