<?php SESSION_START();
require_once('private/user.php');
require_once('private/Aduser.php');
require_once('private/gameManager.php');
require_once('private/FriendManager.php');
$_SESSION['user']= unserialize(serialize($_SESSION['user']));
//$_SESSION['gameManager']= unserialize(serialize($_SESSION['gameManager']));

if(!isset($_SESSION['user'])||!$_SESSION['user']->isloggedin())
die(header("Location:"."Login.php"));

$fm=new FriendManager((int)$_SESSION['user']->uid);
/*if(!isset($_SESSION['gameManager']))
{
$_SESSION['gameManager']= new gameManager();	  
}
*/
if(!isset($_GET['id']))
	{$other=false;
	$temp=$fm->getPublicInfo($_SESSION['user']->uid);
	
	} 
	
else if(isset($_GET['id'])&&is_numeric($_GET['id']))
  {$other=true;
  $status=$fm->status($_GET['id']);
  
   //$Aduser1=new Aduser($_GET['id']); 
  $temp=$fm->getPublicInfo($_GET['id'] );
  }
else die(header("Location:".$_GET['origin']));
	
//	$info = $_SESSION['user']->getinfo();
	//var_dump($info);
$gm=new gameManager()	;
$fgames=$gm->getByString($temp['fgames']);
$gstr=implode(",",$fgames);
//$bio=$Aduser1->getDetails("bio");
//$photo = "profiles/". $Aduser1->getDetails("pphoto") ;
	
  
//var_dump($_SESSION['user']->isloggedin());
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User_profile</title>
  <style>
    #Box {
      background-color: #DCDCDC;

    }

    #Inner-box {
      background-color: snow;
    }

    #Info-box {
      padding:25px;
      background-color: rgb(199, 218, 209);
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      border: 2px groove;
      font-size:18px;
      
    }
    #Gaming-name {
      text-align: center;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

      text-shadow: 5px 5px 5px grey;
    }

    .Gamer-Info {
      margin-top:10px;
      padding:5px;
      height:65px;
      background-color: rgb(59, 59, 110);
      font-size: 35px;
      font-family: georgia;
      border-radius:15px;
      text-shadow: 3px 3px 5px black;
    }

    .heading {
      padding: 1px;
      background-color: #007bff;
      font-family: georgia;
      font-size: 35px;
      height:65px;
      border-radius:15px;
    }

    .posts-box {
      height: 500px;
      background-color: #DCDCDC;
      border: 5px groove;
    }
    
    #nav-c{
      background:linear-gradient(to right,rgb(95, 183, 218) ,purple ); 
    }
    .pic{
      transition:1s;
    }
    .pic:hover{
      transform:scale(1.1);
    }
    #Cover{
     padding:10px;
     
    }
   
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="private/js/user.js"></script>
<script src="private/js/jquery.js"></script>
<script src="private/js/profile.js"></script>
</head>

<body>

  <div class="container-fluid " id="Box">
    <!-- NavBar -->
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
            <li><a href="#" class="nav-link active" style="font-family: 'Galada',Cursive;">Profile</a><span
                class="sr-only">(current)</span></li>
            <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notification</a></li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Friends
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item " href="Friends.php">Friends</a>
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
    <!-- Navbar closed -->
    <div class="container shadow-lg " id="Inner-box">
      <br>
      <br>
      <br>
      <br>
      <div class="container shadow " id="Cover">

<?php
$time=time();
echo  <<<EOF
        <!-- profile pic -->
        <center><img src="profiles/{$temp['prophoto']}?q={$time}" class="rounded-circle shadow-lg pic" style="border: 1px solid black ;" width="300" height="300"></center>
        
      </div>

 

           <p class="display-4 text-black " id="Gaming-name">{$temp['username']}</p>
      <!-- gamer info -->
      <div class="container-fluid shadow Gamer-Info ">
      <p class="text-white" style="text-align:center">Gamer Info <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
    </svg></p>
    </div>
      <div class="container rounded shadow-lg  " id="Info-box">
        <strong><label>Name: </label> <label  >{$temp['name']}</label><br><br>
          <label>City: </label> <label  >{$temp['city']}</label><br><br>
          <label>Age: </label> <label  > {$temp['age']}</label><br><br>
          <label>Bio: </label> <label  >{$temp['bio']}</label><br><br>
          <label>Gaming Genre: </label> <label   > Arcade,Action,Racing,Stratragey</label><br><br>
          <label>Games: </label> <label  >{$gstr}</label><br>
          <label></label><label></label><br>
        </strong>
      </div>
      <!-- gamer info -->
EOF;
if(!$other)
echo <<<EOF
      <br>
      <a href="Updateinfo.php"><button class="btn btn-warning">Add/change Details</button></a> <a href="UpdateAvtar.php"><button class="btn btn-primary">Update Avatar</button></a> 
      <br>
	  <br>
	  <a href="Share_your_post.php"><button class="btn btn-outline-primary ">Share Your Gaming Experiences</button></a>
      <br>
EOF;
else {
  if($status==1)
echo <<<EOF
         <br>
      <button id="ActionBar" class="btn btn-warning" onclick="toggle({$temp['uid']});">Delete friend</button><a href="Chatting.php?origin=Profile.php%3Fid={$temp['uid' ]}&friend={$temp['uid']}"><button class="btn btn-primary">Message</button></a> 
      <br>
   
	  <br>
EOF;

else if($status==-1)
echo <<<EOF
     <br>
      <button  id="ActionBar" class="btn btn-warning" onclick="toggle({$temp['uid']});">Add friend</button>
      <br>
 EOF;
 else if($status==0)
 echo <<<EOF
    <br>
      <button  id="ActionBar" class="btn btn-warning" onclick="toggle({$temp['uid']});" >Requested</button>
    <br>
 EOF;


} 
?>
	  <br>
      <diV class="container-fluid shadow-lg rounded bg-dark "><center><p class="text-light" style="font-size:25px">Friends</p></center></diV>
      <div class="container shadow-lg rounded" style="height: 200px; border: 2px groove;">
       <center><h1>No Friends  <a href="Friends.html"><button class="btn btn-warning">Add Friends</button></a><h1></center>
	   
      </div>
      <br>
      <!-- gamer's post -->
      <div class=" container-fluid shadow-lg rounded heading">
        <p class="text-light">Posts</p>
      </div>
      <div class="container ml-0 overflow-auto posts-box">
      <table>
       <!-- <tr>
      <td><div><a href="background2.jpg"><img src="background2.jpg" alt="post1" class="img-fluid" width="280" height="280"></a></div></td>
      <td> <div><a href="Gamer1.jpg"><img src="Gamer1.jpg" alt="post1" class="img-fluid" width="280"height="280"></a></div> </td>
      <td> <div><a href="Gamer1.jpg"><img src="Gamer1.jpg" alt="post1" class="img-fluid" width="280"height="280"></a></div> </td>
      <td><div><a href="background2.jpg"><img src="background2.jpg" alt="post1" class="img-fluid" width="280"height="280"></a></div></td>
      </tr>
      <tr>
        <td><div><a href="background2.jpg"><img src="background2.jpg" alt="post1" class="img-fluid" width="280"height="280"></a></div></td>
        <td> <div><a href="background2.jpg"><img src="Gamer1.jpg" alt="post1" class="img-fluid" width="280" height="280"></a></div> </td>
        <td> <div><a href="Gamer1.jpg"><img src="Gamer1.jpg" alt="post1" class="img-fluid" width="280" height="280"></a></div> </td>
        <td><div><a href="background2.jpg"><img src="background2.jpg" alt="post1" class="img-fluid" width="280" height="280"></a></div></td>
        </tr>  -->
	  <center>	<h1>No Post Yet<h1></center>
        </table>

      </div>
      <br>
      
      <br>
      <br>
    </diV>
  </div>
  <!-- footer -->
  <diV class="container-fluid " id="nav-c">
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
</body>

</html>
<?php
//var_dump($temp) ;

?>