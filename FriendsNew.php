<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
    <style>
        .Box {
            background-color: #DCDCDC;
      
          }
      
          .Inner-box {
            align-items: center;
            background-color: snow;
          }
          .heading-Box{
              font-size: 25px;
              font-family:'Times New Roman', Times, serif;
              text-align:center;
              background-color: #00244a;
              border-top-left-radius: 20px;
              border-top-right-radius: 20px;

          }
          a:hover{
              text-decoration: none;
              
          }
         
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid Box " >
    <!-- NavBar -->
    <div class="container-fluid  " id="Nav-Box">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info" style="opacity: 0.7;">
          <a class="navbar-brand ml-5" href="#">
            <img src="Game1.jpg" width="50" height="50" class="rounded-circle align-top" alt="" loading="lazy"></a>
          <a class="navbar-brand ml-2" style="font-family:georgia;" href="#">Gamer'sZone</a>
  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active "><a href="HomeUser.html" class="nav-link"
                  style="font-family: 'Galada',Cursive;">Home</a></li>
              <li><a href="Profile.html" class="nav-link " style="font-family: 'Galada',Cursive;">Profile</a><span
                  class="sr-only">(current)</span></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Notification</a></li>
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Friends
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Friends.html">Friends</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Chat</a>
               
                
              </div></li>
              <li><a href="#" class="nav-link" style="font-family: 'Galada',Cursive;">Settings</a></li>
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
      <div class="container Inner-box">
          <br>
          <br>
          <br>
          <br>
      <p class="text-dark display-4" style="font-family:Georgia, 'Times New Roman', Times, serif;">New to Gamer's Zone ?, No Friends ? Add Your Gaming Friends.</p>
        <center><button class="btn btn-warning btn-lg">Add Friends</button></center>
            <br>
            <br>
            <!-- suggestions -->
            <div class=" shadow-lg  text-light heading-Box"><p >Suggestions</p></div>
            <div class="container shadow-sm overflow-auto suggest" style="height: 350px;">
            <table class="table table-hover">
                <tr>
                    <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                     <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                     <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                       </svg></button></a></td>
                 </tr>
            <tr>
                <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                 <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                 <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                   </svg></button></a></td>
             </tr>
            <tr>
                <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                 <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                 <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                   </svg></button></a></td>
             </tr>
             <tr>
                <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                 <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                 <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                   </svg></button></a></td>
             </tr>
             <tr>
                <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                 <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                 <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                   </svg></button></a></td>
             </tr>
             <tr>
                <a href="#"><td><img src="background2.jpg" class="img-fluid rounded-circle" width="30px" height="30px"></td>
                 <td><a href="#" class="text-dark"><p >Gaming Name</a></p></td> 
                 <td><a href="#"><button class="btn btn-outline-primary">Send Request <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                   </svg></button></a></td>
             </tr>
            </table>
            </div>
        </div>
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