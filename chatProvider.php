<?php SESSION_START();
require_once('private/ChatManager.php');
$_SESSION['ChatManager']= unserialize(serialize($_SESSION['ChatManager']));

if(isset($_GET['chats'])&&$_GET['chats']==1)
{
   $_SESSION['ChatManager']->connect();
    $_SESSION['ChatManager']->formateAndEcho($_SESSION['ChatManager']->getAllMessages());
}
else die(header("Location:"."HomeUser.php"));


?>