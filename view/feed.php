<?php
include("sessionstart.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>

    
    <!--<img id='toplogo' src='./img/quenchlogo.png'/>-->    

    <div class="nav">
        <ul>
            <li><a href="#/additem"><img class="nav_img" src="./img/camera.png" id="post"></a></li>
            <li><a href="#/user"><img class="nav_img" src="./img/person.png" id="profile"></a></li>
            <li><a href="#/feed"><img class="nav_img" src="./img/home.png" id="profile"></a></li>
            <li><a href="search.html"><img class="nav_img" src="./img/mag_glass.png" id="post"></a></li>
        </ul>
        </div>
        
        
    <div id='feed'></div>    
    </body>
    
    <script>
    $(document).ready(function(){
        
           $.ajax({
               url:"controller/feed.php",
                type:"POST",
                dataType:"json",
                data: {
                    method:"getfeed"
                },
                success:function(resp){
                    //alert("Got all images!");
                    console.log(resp);
                    
                    for(var i = 0; i<resp.length; i++){
                     var thediv = document.getElementById("feed");    
                     var div = document.createElement("div");  
                     var location = document.createElement("p");    
                     var h3 = document.createElement("p");
                     var image = document.createElement("img");
                     var tags = document.createElement("p");
                        
       
                        h3.innerHTML = resp[i].title;
                        image.src = "./img/1/" +resp[i].path;
                        //image.src = "./img/1/ resp[i].path";
                        location.innerHTML = resp[i].location;
                        tags.innerHTML = resp[i].tags;
                        
                        feed.appendChild(div);
                        div.appendChild(h3);
                        div.appendChild(image);
                        div.appendChild(location);
                        div.appendChild(tags);
                        
                        div.style.marginLeft = "40%";
                        location.style.fontSize = "20pt";
                        location.style.marginTop = "0";
                        h3.style.fontSize = "20pt";
                        h3.style.marginBottom = "0";
                        tags.style.marginTop = "-20px";
                        tags.style.fontSize = "10pt";
                        
                    }
                    
                }
            });
            
    });
    </script>
</html>