<?php SESSION_START();
require_once('private/user.php');
require_once('private/cleaninput.php');
require_once('private/SearchProvider.php');

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
    <title>Search</title>
</head>
<style>
#nav-c{
  background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
}
.searchresult{
  background:rgb(59, 59, 110);
  height:65px;
  font-family:'Times New Roman', Times, serif; 
  font-size: 40px;
   text-shadow: 3px 3px 5px black; 
   text-align:center;
   border-radius:15px;
}

</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body style="  background-color: #DCDCDC;">

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
              <input type="submit" class="btn btn-outline-warning my-2 my-sm-0" name="searchbtn" id="search" value="Search">
              <button class="btn btn-outline-danger  my-2 my-sm-0  ml-5" onclick="logout();">Logout</button>

            </form>
          </ul>
          </button>
      </nav>
    </div>
    <!-- Navbar closed -->
    <br>
    <br>
    <br>
       <div class="container searchresult text-light  ">Search results</div>
    <div class="container overflow-auto rounded bg-light shadow-lg">
    <table class="table table-hover">
     <?php

if(isset($_GET['search']))
{
if(isclean($_GET['search']))
{
$sp=new SearchProvider();
$sp->searchByName($_GET['search']);

}
else echo "Invalid search text";
}
?> 
      
    </table>
    </div>
    


</body>
</html>