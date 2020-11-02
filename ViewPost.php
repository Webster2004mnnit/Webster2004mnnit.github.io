<?php
 SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));

if(!isset($_GET['pid'])||!is_numeric($_GET['pid'])) 
die(header("Location:"."HomeUser.php"));

else $pid=$_GET['pid'];

require_once("private/PostViewer.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
    <style>
    
        #Box {
            background-color: #DCDCDC;
      
          }
          #Inner-box {
            align-items: center;
            background-color: snow;
          }
          .post-tag {
            height: 60px;
            border-radius: 10px;
            
          }
          .post-box {
            overflow: auto;
            border: solid snow;
      
          }
          .Review-box {
            height: 72px;
            border: 1px solid snow;
            border-radius: 10px;
      
          }
          .caption{
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size:medium;
            border: 2px solid snow;
          }
          #comment-box{
            height: 85px;
            width:350px;            
          }
          .cmt-btn{
            position:relative;
            left: 350px;
          }
          .comment{
            border-radius: 10px;
            border: 1px groove;
          }
          .side-dropdown{
            position :relative;
              left: 250px;
          }
          @media all and (max-width: 500px)
          {
            #comment-box{
              width: 220px;

            }
            .cmt-btn{
              position:relative;
              left: 200px;
            }
            .side-dropdown{
              position :relative;
              right:0px;
              left:auto;
             }
             .post-tag {
              height: 75px;
              border-radius: 10px;
              
            }
          }
            @media all and (max-width: 1200px)
            {
              .side-dropdown{
                position :relative;
                right:0px;
                left:auto;
               }
               .post-tag {
                height: 75px;
                border-radius: 10px;
            }

          }
          

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   
    <div class="container-fluid  " id="Nav-Box">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
          <a class="navbar-brand ml-5" href="#">
            <img src="Game1.jpg" width="50" height="50" class="rounded-circle align-top" alt="" loading="lazy"></a>
          <a class="navbar-brand ml-2" style="font-family:georgia;" href="#">Gamer'sZone</a>
  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active "><a href="HomeUser.php" class="nav-link"
                  style="font-family: 'Galada',Cursive;">Home </a></li>
              <li><a href="Profile.php" class="nav-link " style="font-family: 'Galada',Cursive;">Profile </a><span
                  class="sr-only">(current)</span></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notification</a></li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Friends
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Friends.php">Friends</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Chat.php">Chat</a>
               
                
              </div></li>
              <li><a href="Settings.php" class="nav-link" style="font-family: 'Galada',Cursive;">Settings</a></li>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                <button class="btn btn-outline-danger  my-2 my-sm-0  ml-5" type="submit">Logout</button>
              </form>
  
            </ul>
            </button>
        </nav>
    </div>
    <!-- Navbar closed --> 
    <div class="container-fluid " id="Box">
    <div class="container shadow-lg   " id="Inner-box">
    <br>
    <br>
    <br>
    <br>

    
        
    <!-- post -->
<?php
$tp=new PostViewer($_SESSION['user']->uid);
$tp->loadPostById($pid);

$temp=$tp->exportInfo();
//var_dump($temp);
$postid=(int)$temp[0];
$createrid=(int)$temp[1];
$creatername=$temp[2];
$createrphoto=$temp[3];
$caption=$temp[4];
$photos=$temp[5];
$date=$temp[6];
$time=$temp[7];
//var_dump($photos);
echo <<<EOF
    <div class="container-fluid post-tag bg-dark ">
      <div class="row"><a href="Profile.php?view=true&id={$createrid}"><img src="profiles/{$createrphoto}" class=" rounded-circle  mt-2  ml-3 mb-1 " width="40" height="40" /></a>
        <p class="display-5 post-title text-white  mt-2  pl-3 col-8"><b>{$creatername}</b><br>{$date}<br>{$time}<br></p> <button type="button" class="btn btn-sm btn-dark mt-1 side-dropdown   dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
         <a class="dropdown-item" href=" ">Report</a>
         <a class="dropdown-item" href=" ">Block User</a>
        </div>
      </div>
    </div>
    <div class="container shadow-sm caption ">
    <p><b><i><h5>{$caption}</h5></b></i>
    </p>
   </div>
    <div class="container shadow-sm post-box">
      <diV class="container overflow-auto  Inner-post-box">
        <center> <img src="posts/{$photos}" class="img-fluid"></center>
      </diV>
    </div>
    <div class="container Review-box shadow-lg">
      <div class="row pt-2">
        <div class="col">
          <button class="btn btn-light">Like</button>
        </div>
        <div class="col">
          <button class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
            class="bi bi-chat-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M2 1h12a1 1 0 0 1 1 1v11.586l-2-2A2 2 0 0 0 11.586 11H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
          </svg>Comment</button>
        </div>
        <div class="col">
          <button class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-share-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
          </svg> Share</button>
        </div>
      </div>
    </div>
EOF;

?>

    <!-- post  end -->

    <!-- comments -->
      <div class="container  rounded bg-light">
        <br>
      <!-- add comment -->
      <label ><strong>Comment:</strong></label>
      <br>
      <input type="text" class=" ml-5 mt-2 rounded shadow form-control" placeholder="Add Comment..." id="comment-box">
      <button class="btn btn-outline-primary pr-4 mt-2 pl-4 mb-2 cmt-btn"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
      </svg></button>
      <br>
      
      <!-- person comment -->
      
      <table class="table table-border">
        <tr>
          <td><img src="COC.jpg" class="rounded-circle" width="30" height="30"><label class="ml-2 mt-2 mb-2 ">Person name</label>
            <p class="ml-4" style="font-size: x-small;">&nbsp; 5 hr</p>
            <div class="container  "><p class="ml-4 "> Nice Pic Bro</p>
              <div class="row "> &nbsp; &nbsp; &nbsp; &nbsp;<p style="font-size: smaller;">Like </p> &nbsp; &nbsp; &nbsp;<p style="font-size: smaller;"> reply</p> </div>  </td>
        </tr>
        <tr>
          <td><img src="COC.jpg" class="rounded-circle" width="30" height="30"><label class="ml-2 mt-2 mb-2 ">Person name</label>
            <p class="ml-4" style="font-size: x-small;">&nbsp; 2 hr</p>
            <div class="container  "><p class="ml-4 "> Nice Pic Bro</p>
              <div class="row "> &nbsp; &nbsp; &nbsp; &nbsp;<p style="font-size: smaller;">Like </p> &nbsp; &nbsp; &nbsp;<p style="font-size: smaller;"> reply</p> </div> </td>
        </tr>
       
      </table>
      <!-- 
      <div class="container comment   pt-2">
        <img src="COC.jpg" class="rounded-circle" width="30" height="30"><label class="ml-2 mt-2 mb-2 ">Person name</label>
        <hr>
        <div class="container  "><p class="pl-3 pr-3 pt-1 pb-2"> Nice Pic Bro</p> </div>
        </div>
       
      <br>
    </div>
    -->
    <!-- comments end -->

    </div>    
 
    </div>
     <!-- footer -->
  <div class="container-fluid bg-info">
    <br>
    <br>
    <center><a class="text-white" href="#">Contact Us</a>|<a class="text-white" href="#">About Us</a></center>
    <br>
    <br>
</div>

<!-- footer closed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
   
</body>
</html>