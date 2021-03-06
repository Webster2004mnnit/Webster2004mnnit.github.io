<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Group</title>
    <style>
        .full{
            background-color: #DCDCDC;
        }
        .create{
            background-color: snow;
            height:400px;
        }
        .choosefrnds{
            background-color: snow;
            height:400px;
        }
        .head{
            text-shadow: 5px 5px 5px black;
            font-size: 40px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-fluid overflow-auto  bg-info"  >
        <center><p class="text-white head " style="font-family: 'Galada',Cursive;">TheGamer'sZone</p></Center>
        </div>
        <div class="container-fluid full">
            <br>
            <a href="Chat.php"><button class="btn btn-danger ml-5 "><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
              </svg> Back</button></a>
        <div class="container row " >
            
            <div class="col container mt-5 ml-4 bg-light ">
                <p>
                  Create Your Gaming Group and  Get connected with your Teammates and Gaming Friends. Disscuss Different stratrgies and Techniques.  
                </p>
            </div>

            <div class="create container shadow-lg  col-sm-5 ml-4 mt-5 mb-5 rounded"> 
            <br> 
            <h4>Create Group 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                  </svg> 
            </h4>
            <hr>
            <input type="text" class="form-control" id="group_name" placeholder="Group Name">
            <br>
            <label>Size</label>
            <div class="col-5">
            <select name="size" id="size" class="form-control ">
                <option  value="3">3</option>
                <option   value="4">4</option>
                <option value="6">6</option>
                <option value="6">10</option>
              </select>
            </div>
            <br>
            <div><img src="" alt="icon" class="rounded-circle shadow-lg" width="50" height="50"></div>
            <label>Group icon</label>
            <br>
            <input type="file" class="form-control-file" value="Upload Image" name="submit">
            <br>
            <button class="btn btn-primary mb-4">Set icon</button>
           

            </div>

            <div class="container col-sm-5 choosefrnds overflow-auto rounded shadow-lg  ml-4 mt-5 mb-5">
                <br> 
                <h4>Choose Friends</h4>
                
                <table class="table">
                   
                   <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><img src="COC.jpg" alt="pic" class="rounded-circle shadow-lg" width="40" height="40"></td>
                        <td>Gaming Name</td>
                        <td><input type="checkbox" class="form-control"></td>
                    </tr>
                </table>
            </div>
           
            


        </div>
        <center><button class="btn btn-success shadow-lg">Create Group</button></center>
        <br>
        <br>
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