function showFriend(uid, name)
{
 var s=`<tr><td class=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg><a href="Profile.php?origin=Chat.php&id=`+uid+`"><img src="CSGO.jpg" width="40" height="40" class="rounded-circle "></a></td><td class=""><a href="Chatting.php?origin=Friends.php&friend=`+uid+`">`+name+`</a></td><td class=""><a href="Chatting.php?origin=Chat.php&friend=`+uid+`" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.406c-.52.263-1.639.742-3.468 1.105z"/>
              <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a></td></tr>`;
              
              $('#friendsdiv').append(s);
             // alert("ok");
 
}



function fetch(data)
{

var link = "resource.php?"+data+"=1";
//alert(link);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
 
if (this.readyState == 4)
{
	
	
if (this.status == 200)
{
	
	
if (this.responseText !="ERROR")
{ //alert("processing");
   processAndshow(this, data);
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





function processAndshow(xml,data) {
  
  var i;
  var xmlDoc = xml.responseXML;
  //alert(data);
 
  var x = xmlDoc.getElementsByTagName("info");
 // alert(x.length);
     
  for (i = 0; i <x.length; i++) {
    
    var name=x[i].childNodes[0].nodeValue;
    var id=x[i].id;
    
showFriend(id, name);
  }

}