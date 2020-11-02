<?php SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));

if(isset($_SESSION['user'])&&$_SESSION['user']->logout())
{
session_destroy();
echo "OK";
} 

?>


