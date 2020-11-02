<?php SESSION_START();

require_once('private/Post.php');
require_once('private/FriendManager.php');

require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));

$po=new PostManager($_SESSION['user']->uid);
$fm=new FriendManager($_SESSION['user']->uid);
$friends=$fm->getAllFriends();
$posts=Array();
foreach ($friends as $friend)
{
$posts[] = $po->GetPostOfUser($friend['uid']);
}
$posts[] = $po->GetPostOfUser($_SESSION['user']->uid);

shuffle($posts);
//var_dump($posts);
//$po=new PostManager(2);
//$po->ini("hello", "world", "public");
//$po->createPost();
//var_dump($po->getPostOfUser(1));
//$po->DeletePost(3);
$po->formateAndEcho($posts) ;

//var_dump($_SESSION['user']->isloggedin());
?>
