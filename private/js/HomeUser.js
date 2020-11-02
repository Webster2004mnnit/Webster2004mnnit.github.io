function showPost(caption, images, date, time, by)
{
var s =`   <div class="container-fluid post-tag bg-dark ">
        <div class="row"><img src="post.jpg" class="img-fluid rounded-circle  mt-2  ml-3 mb-1" width="30" height="30">
          <p class="display-5 post-title text-white  mt-2  pl-3">`+by+`,  `+date+`, `+time+` </p>
        </div>
      </div>
      <div class="container shadow-sm caption ">
      <p ><h5><b><i>`+caption+`</i></b></h5></p>
     </div>
      <div class="container shadow-sm post-box">
        <diV class="container overflow-auto  Inner-post-box">
          <center> <img src="posts/`+images+`" class="img-fluid"></center>
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
            <button class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24">
                  <path
                    d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-6 17c1.513-6.587 7-7.778 7-7.778v-2.222l5 4.425-5 4.464v-2.223c0 .001-3.78-.114-7 3.334z" />
                  </svg> Share</button></div></div></div><br><br>`;  
      
      $('#Inner-box').append(s);
     //alert("ok");
}

function fetch()
{

var link = "PostProvider.php";
//alert(link);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{ //alert("processing");
   processAndshow(this);
  // alert(data);
}
else alert("Server error");



}
else alert("something Went wrong!!");



}



  };
  xhttp.open("GET",link, true);
  xhttp.send();
  

} 



function processAndshow(xml) {
  
  var i;
  var xmlDoc = xml.responseXML;
  //alert(data);
 
  var x = xmlDoc.getElementsByTagName("post");
 // alert(x.length);
     
  for (i = 0; i <x.length; i++) {
    

// showPost(caption, images, date, time, by);
var by= x[i].getElementsByTagName("by")[0].childNodes[0].nodeValue; 
var image= x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue; 
var date= x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue; 
var time= x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue; 
var caption = x[i].getElementsByTagName("caption")[0].childNodes[0].nodeValue; 
    showPost(caption, image,date , time , by );
    
    
    
  }

}




 



//showPost();