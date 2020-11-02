<?php  SESSION_START();
require_once('private/user.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));


if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
    <style>
      #Box {
        background-color: #DCDCDC;
  
      }
      #Inner-box {
        align-items: center;
        background-color: snow;
		width:500px;
		height:800px;
		overflow:auto;
        
      }
      .flex-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
       justify-content: space-around;
    }
    a:hover{
      text-decoration: solid;
    }
    .heading-Box{
      font-size: 25px;
      font-family:'Times New Roman', Times, serif;
      text-align:center;
      background-color: #00244a;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      height:50px;
	  width:500px;
  }
  .frnd-rqt{
	  width:400px; 
	  
	  height:350px;
  }
  .frnds{
     width:500px; 
	 height:50px;
  }
  .suggest{
     width: 500px; 
	 height: 300px;
	 padding:10px;
  }
  #nav-c{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
    }
   @media all and (max-width: 500px){
	   .frnd-rqt{
	    width:250px;
		
	   }
	   .frnds{
		   width:340px;
	   }
	   .suggest{
		   width:340px;
	   }
	   #Inner-box{
	      width:340px;
	   }
	   .heading-Box{
		 width:340px;
	   }
   }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
   <script src="private/js/user.js">
     
   </script>
        <script src="private/js/jquery.js">
          
        </script>
        
 <script src="private/js/friends.js"></script>    
    
</head>
<body>
    <div class="container-fluid " id="Box">
    <!-- navbar -->
    <div class="container-fluid  " id="Nav-Box">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark " id="nav-c">
          <a class="navbar-brand ml-5" href="#">
            <img src="Game1.jpg" width="50" height="50" class="rounded-circle align-top" alt="" loading="lazy"></a>
          <a class="navbar-brand ml-2" style="font-family:georgia;" href="#">Gamer'sZone</a>
  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item "><a href="HomeUser.php" class="nav-link"
                  style="font-family: 'Galada',Cursive;">Home</a></li>
              <li><a href="Profile.php" class="nav-link " style="font-family: 'Galada',Cursive;">Profile</a><span
                  class="sr-only">(current)</span></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notification</a></li>
              <li class="nav-item active dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Friends
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="#">Friends</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Chat.php">Chat</a>
                
               
              </div></li>
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
	  
   <!-- navbar closed -->
   <br>
   <br>
   <br>
   <br>
   <button class="btn btn-primary float-right"  onclick="refresh()">Refresh</button>
   <br>
   <br>
   <div class="flex-container ">
    

    
        <div class=" bg-light shadow-lg rounded mt-3 ml-2 p-2 frnd-rqt" >
            <div ><center><h2><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg> Friend Requests</h2></center></div>
       <div  class="overflow-auto rqt-table">
        <table class="friend-request-list table-hover table " id="RequestTable">
        
        </table>
        <p style="text-align:center;">No more Requests now</p>
       </div>
       
       </diV>
        
       
    
         <!-- friend list -->
         <div class=" ml-2 mt-3 shadow-lg ">
              
       <div  id="Inner-box">
        <div class=" shadow-lg rounded bg-dark frnds " ><center><p class="text-light" style="font-size:25px">Friends <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
        </svg></p></center></div>
        <table class="table table-borderd table-hover " id="AllFriendsTable">
          <tbody>
       </tbody>
        </table>
        
       </div>
	   </div>
      
       <!-- friend list -->
<!--
       
       <div class="bg-light  overflow-auto p-3 mt-3" style="width:400px; height:350px;">
        <div ><center><h3>Sent requests 
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
        </svg></h3></center></div>
       <div class="overflow-auto">
        <table class="table  table-hover">
            <tr><td>
               <a href="#" class="text-dark"><p><img src="background2.jpg" width="40px" height="40px" class="img-fluid rounded-circle mr-2">Person name</p></a> 
            </td></tr>
            <tr><td>
              <a href="#" class="text-dark"><p><img src="background2.jpg" width="40px" height="40px" class="img-fluid rounded-circle mr-2">Person name</p></a> 
         </td></tr>
         <tr><td>
          <a href="#" class="text-dark"><p><img src="background2.jpg" width="40px" height="40px" class="img-fluid rounded-circle mr-2">Person name</p></a> 
         </td></tr>
        </table>
      </div>
      <button class="btn btn-warning">Add Friends</button>
    </div>
    -->
    <!-- sent requests -->  

<br>
<!-- suggestions -->
<div class="ml-2 mt-3 shadow-lg " style="height:350px;" >

 <div class=" text-light heading-Box" ><p >Suggestions</p></div>
  <div class=" bg-light overflow-auto suggest" style="">
   <table class="table table-hover" id="SuggestionTable"style="margin:auto;width:100%;">

   </table>

     <p style="text-align:center;margin-top:30px;">No more Suggestions  now</p>
</div>
</div>



</div>
<br>
    
<br>
</div>
      <!-- footer -->
  <diV class="container-fluid   " id="nav-c" >
    <br>
    <br>
    <center><a class="text-white" href="#">Contact Us</a>|<a class="text-white" href="#">About Us</a></center>
    <br>
    <br>
  </diV>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
       <script>
       function refresh()
{ $('#SuggestionTable').html("");
  // alert(x.length);
      $('#RequestTable').html("");
  // alert(x.length);
      $('#AllFriendsTable').html("");
  
fetch("suggestions");
fetch("requests");
fetch("friends");

} 


refresh() ;
//setInterval('refresh()', 4000);




//show() ;
          </script> 
    
    
</body>
</html>