<?php SESSION_START();
require_once('private/user.php');
require_once('private/FriendManager.php');
require_once('private/ChatManager.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));
$_SESSION['ChatManager']= unserialize(serialize($_SESSION['ChatManager']));
//$_SESSION['FriendManager']= unserialize(serialize($_SESSION['FriendManager']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));

if(isset($_GET['friend'])&&is_numeric($_GET['friend']))
{
$temp=$_GET['friend'];
if(!isset($_SESSION['ChatManager']))
$_SESSION['ChatManager']=new ChatManager($_SESSION['user']->uid);

if(!$_SESSION['ChatManager']->iniChat($temp))
die(header("Location:".$_GET['origin']));
  

}
else 
die(header("Location:"."HomeUser.php"));



/*
if(!isset($_SESSION['FriendManager']))
$_SESSION['FriendManager']=new FriendManager($_SESSION['user']->uid);
if(is_numeric($_GET['friend']))
{
$info=$_SESSION['FriendManager']->getPublicInfo($_GET['friend']);
  
}*/

$FriendManager=new FriendManager($_SESSION['user']->uid);

if(is_numeric($_GET['friend']))
{
$info=$FriendManager->getPublicInfo($_GET['friend']);
  
}
//var_dump($_SESSION['user']->isloggedin());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatting</title>
    <style>
        #message-box{
            height: 85px;
            width:350px;            
          } 
          label{
              font-size: 15px;
              color:chartreuse;
              
          }
          .Name-box{
              font-size:25px ;
              font-family: Georgia;
              height:65px;
              border-radius: 10px;
              position:relative;
          }
          .block-btn{
              width:40px;
              height:40px;
              position:absolute;
              right:0px;
          }
          .send-btn{
            
          }
          .message-div{
              position: relative;
              height:800px;

          }
          .rec-message{
              float:left;
              max-width: 65%;
              border-radius: 20px;
              box-shadow:5px 5px 10px grey;
              background:linear-gradient(to left,cornflowerblue,pink);
              padding-left:15px;
              padding-right: 15px;
              padding-top: 10px;
              padding-bottom:8px;
              font-family:monospace;
              font-size: 15px;
          
          }
          .send-message{
           
            float:right;
       max-width: 65%;
            font-size: 15px;
            padding-left:15px;
            padding-right: 15px;
            padding-top: 10px;
            padding-bottom:8px;
            border-radius: 20px;
            font-family:monospace;
            background:linear-gradient(to bottom,rgb(115, 255, 0),skyblue);

          }
          .send-box{
              position:absolute;
              bottom:0px;
          }
          .display-msg{
            overflow:scroll;
            height:500px;
          }
          #nav-c{
            background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
          }
          @media all and (max-width: 500px)
          {
            #message-box{
                height: 85px;
                width:250px;            
              } 
          }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <script src="private/js/jquery.js">
          </script>    
    <script src="private/js/chatting.js">
      
    </script>

</head>
<body style=" background-color: #DCDCDC;">
    
<div class="container-fluid text-center  display-4 text-light" id="nav-c">Chat <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-text-fill mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
 <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
 </svg></div>
 <div class="container shadow-lg bg-light ">

    <br>
    <?php
    echo <<<EOF
    <a href="{$_GET['origin']}"><button class="btn btn-danger ml-5 mb-3"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
      </svg> Back</button></a>
      <br>
    <br>
    EOF;
    echo <<<EOF
    <div class="container shadow-lg Name-box bg-dark pt-3 "><p class="text-light Name-box" ><a href="Profile.php?origin=Chatting.php&id={$info['uid']}" ><img src="profiles/{$info['prophoto']}" class="rounded-circle" width="30" height="30" ></a>{$info['name']}<!--<label class="status">active</label>--> <button class="block-btn btn btn-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  </svg></button></p></div>
  EOF;
 ?>
 <div class="container mt-0 p-5 shadow-lg message-div" >
   
   <div id="recentChat" class=" display-msg ">
  
    
    
  </div> 

   <div class=" container send-box">
   
   <strong> <p>Send message <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
  </svg></p></strong>
   <div class="row">
    <input type="text" placeholder="message.." class="form-control col-5" id="message-box">  <div class="col-1"><button onClick="sendMessage()" class="btn btn-outline-primary pr-4 mt-4 pl-4 mb-2 send-btn "><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
    </svg></button></div>
  </div>
  <br>
  <br>
    </div>
</div>
 </div>
<script>
/*
My("heloo",12) ;
My("heloo",12) ;
Anothers("hhh", 12);
My("heloo",12) ;
Anothers("hhh", 12);
Anothers("hhh", 12);
Anothers("hhh", 12);
*/
<?php

echo "var myId=" . $_SESSION['user']->uid. ";";

?>
function refresh()
{
fetch(myId);
scroll() ;
} 
function scroll()  {
                 $('#recentChat').animate({
                     scrollTop: 9000
                 },
                 1500);} 

refresh() ;
setInterval('refresh()', 4000);

</script>


</body>
</html>
