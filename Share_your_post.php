<?php SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));
//var_dump($_SESSION['user']->isloggedin());
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        #Box {
            background-color: #DCDCDC;
      
          }
          #Inner-box {
            background-color: aliceblue;
            border: 5px solid aliceblue;
            border-radius: 20px;
            
            
          }
          .heading{
              height:60px;
              font-size:25px;
              border-bottom: 1px solid blue;
              
          }
          label{
              font-family:'Times New Roman', Times, serif;
          }
      
    </style>
</head>

<body>
    <!-- header -->
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
              <li class="nav-item "><a href="HomeUser.html" class="nav-link"
                  style="font-family: 'Galada',Cursive;">Home</a></li>
              <li><a href="Profile.html" class="nav-link"  style="font-family: 'Galada',Cursive;">Profile</a></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notification</a></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Chat</a></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Settings</a></li>
                <form class="form-inline my-2 my-lg-0" method="get" action="Search.php">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                <button class="btn btn-outline-danger  my-2 my-sm-0  ml-5"  onclick="logout();">Logout</button>
              </form>
  
            </ul>
            </button>
        </nav>
      </div>
    <!-- header closed -->
    <br>
    <br>

     <div class="container-fluid " id="Box" >
    <br>
    <br>
    <!-- form -->
    <div class="container shadow-lg pl-5 pr-5 " id="Inner-box">
        <div class="container  heading " style="background-color:aliceblue; font-family:'Times New Roman', Times, serif;"><p class=" text-primary ml-5 pt-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V11a.5.5 0 0 0 1 0V9.5H10a.5.5 0 0 0 0-1H8.5V7z"/>
          </svg> Create  Your Post</strong></p></div>
     <form method="post", action= "#"  enctype="multipart/form-data">
         <br>
         <br>
        <label for="caption">Caption:</label>
        <textarea class="form-control" id="caption" style="border: 2px groove; height: 150px " name="caption"></textarea>
      
        <br>
        <br>
         <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
        <label>Upload Image or Video</label><input type="file" class="form-control-file" value="Upload Image" name="file">
         <br>
         <br>
         <label for="ShareTo">Share to:</label>
         <div class="col-2"><select name="ShareTo" id="ShareTo" class="form-control ">
            <option  value="public">Public</option>
            <option   value="friends">Friends</option>
          </select></div>
          <br>
          <br>
          <center><button class=" btn btn-outline-warning">Preview</button></center>
          <br>
        <center><input type="submit" value="Upload post" class="  btn btn-primary" name="submit"></center>
        <br>
        <br>
        <button class="btn btn-danger " style="width: 150px;"><a>Live Stream</a></button>
        <br>
        <br>
     </form>
    </div>
    <br>
    <br>
    </div>
    
    <!-- footer -->
    <diV class="container-fluid bg-info">
        <br>
        <br>
        <center><a class="text-white" href="#">Contact Us</a>|<a class="text-white" href="#">About Us</a></center>
        <br>
        <br>
    </diV>
   
    <!-- footer closed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>


</body>

</html>

<?php





if(isset($_POST['submit']))
{
 require_once("private/cleaninput.php");
require_once("private/Post.php");
$to=$_POST['ShareTo'];

$flag=true; 
if(isset($to))
{
if(!isclean($to)) 
$flag=false;

}


if(isset($_POST['caption'])&&$_POST['caption']!="") 
{
if(!isclean($_POST['caption']))  
$flag=false;
else 
$caption=$_POST['caption'];

}



if($flag&&isset($_FILES['file']['name'])&&$_FILES['file']['name']!="")
{
$dir="posts/" ;
 $fname=md5(time()."secure").".jpg";
 $tmp=$_FILES['file']['tmp_name'];
 if(!move_uploaded_file($tmp, $dir.$fname)) {$error[]="File Not uploaded";
    $flag=false;
   } 
}
 var_dump($caption);
var_dump($fname);
if($flag&&(isset($caption)||isset($fname)) )
{$p=new PostManager($_SESSION['user']->uid);
 $p->ini($caption, $fname, $to);
 if($p->createPost()) 
 {unset($p);

 echo "<script>alert('post created ans shared successfully') ;window.location.replace('HomeUser.php' ) ;</script>" ;
 } 
} 
else echo "<script>alert('Something went wrong') ;</script>" ;

}


//var_dump($_FILES);

//var_dump($_POST);
?>