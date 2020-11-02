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
  <title>Home</title>
  <style>
    #Box {
      background-color: #DCDCDC;

    }

    #Inner-box {
      align-items: center;
      
      background-color: aliceblue;
    }

    #News-box {
      height: 200px;
      margin: auto;
      border: groove;
      border-radius: 5px;
      align-content: center;
      background-color: rgb(199, 218, 209);
    }

    #friends-post {
      background:rgb(59, 59, 110);
      height:65px;

    }


    .post-box {
      overflow: auto;
      border: solid snow;

    }

    .news-text {

      text-shadow: 1px 1px 2px black;

    }

    #update {
      height: 50px;
      border: 2px solid #545b62;
      background-color: #002348d4;
      border-radius: 5px;
      font-size: XX-large;
      font-family: Georgia, 'Times New Roman', Times, serif;
      text-shadow: 3px 3px 3px black;
    }

    .post-tag {
      height: 60px;
      border: 2px solid snow;
      border-radius: 10px;
    }

    .Review-box {
      height: 72px;
      border: 2px solid snow;
      border-radius: 10px;

    }

    .post-title {
      font-size: larger;
      font-family: Georgia, 'Times New Roman', Times, serif;

    }

    .userimg {
      border: 2px rgb(15, 233, 215);
    }
    .caption{
      font-family:Verdana, Geneva, Tahoma, sans-serif;
      font-size:medium;
      border: 2px solid snow;
    }
    a:hover{
       
    }
	.flex-container{
          display: flex;
          flex-direction: row;
          flex-wrap: wrap;
         justify-content: space-around;
         font-family:georgia;
      }
      ul{
        list-style-type: none;
      }
      .items{
        margin-top: 10px;
        font-size: 15px;
        font-family:georgia;
       
      }
      .copyright{
        text-shadow: 2px 2px 3px black;
      }
      #welcome{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
     min-height: 75px;
      font-size: 25px;
      font-family:georgia;
      padding-top: 10px;
      text-align:center;
    }
    #nav-c{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
    }
      #VBox{
    height: 180px;
    overflow-x:scroll;
    overflow-y: hidden;
    border: 1px groove;
    background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
    white-space:nowrap;
    border: 2px  groove;
  }
  #VBox::-webkit-scrollbar{
    display:none;
  }
  #card-box{
    display: inline-block;
    margin:20px;
    border: 2px groove;
    width:200px;
    transition:0.5s;
    border-radius:10px;
    font-size: 25px;
    text-align: center;
    color:black;
    font-family:georgia;
    box-shadow: 5px 5px 15px black;
  }
  #card-box:hover{
    transform:scale(1.1);
    
  }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="private/js/user.js"></script>
<script src="private/js/jquery.js"></script>
<script src="private/js/HomeUser.js"></script>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<body>
 
    <!-- NavBar -->
   
      <nav class="navbar navbar-expand-lg  navbar-dark" id="nav-c">
        <a class="navbar-brand ml-5" href="#">
          <img src="Game1.jpg" width="60" height="60" class="rounded-circle align-top" alt="" loading="lazy"></a>
        <a class="navbar-brand ml-2" style="font-family:georgia;" href="#">Gamer'sZone</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active"><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Home<span
                  class="sr-only">(current)</span></a></li>
            <li><a href="Profile.php" class="nav-link" style="font-family: 'Galada',Cursive;">Profile</a></li>
            <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notifications</a></li>
                   <li class="nav-item  dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="font-family: 'Galada',Cursive;">
                Friends
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Friends.php"  style="font-family: 'Galada',Cursive;">Friends</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Chat.php"  style="font-family: 'Galada',Cursive;">Chat</a>
            <li><a href="Settings.php" class="nav-link" style="font-family: 'Galada',Cursive;">Settings</a></li>
            <form class="form-inline my-2 my-lg-0" method="get" action="Search.php">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
              <button class="btn btn-outline-danger  my-2 my-sm-0  ml-5" onclick="logout();">Logout</button>

            </form>
          </ul>
          </button>
      </nav>
    </div>
    <!-- Navbar closed -->
      
      <!-- carousel -->


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="max-height:600px;">
        <div class="carousel-item active">
          <img src="1.1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="2.3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="3.3.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- carousel closed -->

    <div class="container-fluid " id="welcome">
    <?php
      echo <<<EOF
      
        <p>Hey <b>{$_SESSION['user']->name}</b>!!!   Welcome to Gamer's Zone</p>
      </div>
      EOF;
     ?>
     
    </div>
    <div class=" container-fluid sticky-top " id="VBox">
    <a  href="Profile.php" ><div class="col" id="card-box"><h1 class="display-4  text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
      <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg></h1>
    <p class="text-dark"  >Your Profile</p></div></a>

   <a href="Share_your_post.php" > <div class="col" id="card-box"><h1 class="display-4 text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
    </svg></h1>
    <p class="text-dark"  >Create Post</p></div></a>


    <a href="Friends.php" ><div class="col" id="card-box"><h1 class="display-4  text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
    </svg></h1>
    <p class="text-dark" >Friends</p></div></a>
   <a href="Chat.php"> <div class="col" id="card-box"><h1 class="display-4  text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
    </svg></h1>
    <p class="text-dark"  >Chat</p></div></a>
    <a href="Settings.php" ><div class="col" id="card-box"><h1 class="display-4  text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
    </svg></h1>
    <p class="text-dark"  >Setting</p></div></a>

    <div class="col" id="card-box"><h1 class="display-4  text-dark"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
      <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
      <circle cx="8" cy="4.5" r="1"/>
    </svg></h1>
    <p class="text-dark"  >About us</p></div>
 
    </div>
  <div class="container-fluid " id="Box">
  <br>
  <br>
    <div class="container-fluid shadow-lg rounded" id="friends-post">
        <p class="text-white"
          style="font-family:'Times New Roman', Times, serif; font-size: 40px; text-shadow: 3px 3px 5px black; text-align:center">
          Friend's posts   <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12.002 4h-10a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
            <path fill-rule="evenodd" d="M4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
          </svg></p>
    </div>
      <div class="container shadow-lg   " id="Inner-box">
      <!-- Friends post -->
      

      <br>


     </div>
          <a href="# "><p class="text-warning " style="text-align: center; ">More stories >></p></a>
               <br>
     <br>
    </div>

  
  
    <!-- footer -->
  <div class="container-fluid flex-container  text-light" id="nav-c">
    <div class=" container mt-4  " style="width:300px;">
     <h5 style="font-family:Georgia, 'Times New Roman', Times, serif;"><img src="Game1.jpg" class="rounded-circle" width="40" height="40"> TheGamer'sZone</h5>
     <p style="font-size: small;"> Gamer's Zone Provide you an enviroment to Get connect with the Gaming world . Disscuss Things Realated to Gaming and get Pro tips from pro Gamers. Explore Games and Gaming world. Good Luck!</p>
     <h6>Contact Info</h6>
    <p>Phone No: +91-992341****</p>
     <p>Email: gamersZone@gmail.com</p>
     

    </div>

    <div class="container mt-4  " style="width: 300px;">
      <h5>Navigation</h5>
      <ul>
        <li class="items"><a> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
          <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        </svg>
        Home</a></li>
        <li class="items"><a> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg> Profile</a></li>
        <li class="items"><a> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg> Friends</a></li>
        <li class="items"><a> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
        </svg> Setting</a></li>
        <li class="items"><a>
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
          </svg> Logout</a></li>
      </ul>
    </div>
   
    <div class="container mt-4 " style="width: 300px">   
      <p><img src="fb.png" class="rounded-circle ml-2" width="30" height="30"> <img src="insta.webp" class="rounded-circle ml-2" width="40" height="40"> <img src="twit.png" class="rounded-circle" width="30" height="30"></p>
      <p class="item"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
     </svg> About us </p>
        <form>
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-warning mt-2 mb-3" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
         <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
       </svg>Search</button>
     </form>
   </div>
    
</div>
<div class="container-fluid  pt-2 pb-2  copyright text-light" style="background: #8E2DE2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #4A00E0, #8E2DE2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #4A00E0, #8E2DE2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  
  <center><h5>&copy TheGamer'sZone</h5></center>
</div>


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
<script>
fetch();
</script>

</html>