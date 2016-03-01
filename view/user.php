<?php
include("sessionstart.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
        
        <section class='loginsection'>
             
            <form id='myForm'>
                <input type='file' id='myfile'/>
                <button id='upload'>Change Profile Picture</button>
             </form>
             </br>
             
            <div id='editinfo'>
             <label for="email">Email</label>   
             <input type="text" id="email"/>  
             <label for="username">Username</label>      
             <input type="text" id="e_username"/>
             <label for="e_pass">Password</label>      
             <input type="password" id="e_pass"/>
             <label for="e_bio">Bio</label>      
             <input type="text" id="e_bio"/>
             <button type="submit" id="confirmbut">Confirm Your Changes</button>
            </div>    
        
        </section>

        <div id="main_edit">
        
        </div>
    
        <div id='feed'></div>    
    </body>
        
    <div class="nav">
        <ul>
            <li><a href="post.html"><img class="nav_img" src="./img/camera.png" id="post"></a></li>
            <li><a href="#/user"><img class="nav_img" src="./img/person.png" id="profile"></a></li>
            <li><a href="#/feed"><img class="nav_img" src="./img/home.png" id="profile"></a></li>
            <li><a href="search.html"><img class="nav_img" src="./img/mag_glass.png" id="post"></a></li>
        </ul>
        </div>
        
    </body>
    <script>
    $(document).ready(function(){
        
           $.ajax({
                url:"controller/editprofile.php",
                type:"POST",
                dataType:"json",
                data: {
                    method:"getprofile"
                },
                success:function(resp){
                console.log(resp);
                for(var i = 0; i<resp.length; i++){
                    var id = resp[i].id;
                    
                    var div = document.getElementById("editinfo"); 
                    var email = document.getElementById("email");
                    var username = document.getElementById("e_username");
                    var bio = document.getElementById("e_bio");
                    var password = document.getElementById("e_pass");
                    var editbutton = document.getElementById("confirmbut");
                    
                    
                    email.id ="email";
                    email.value = resp[i].email;
                    
                    username.id ="e_username";
                    username.value = resp[i].username;
                    
                    bio.id ="e_bio";
                    bio.value = resp[i].bio;
                    
                    password.id ="e_pass";
                    password.value = resp[i].password;
                    
                    editbutton.onclick = function(){
                     for(var i = 0; i<resp.length; i++){
                       var id = resp[i].id;
                           $.ajax({
                               url:"controller/editprofile.php",
                                type: "POST",
                                dataType: "json",
                                        data: {
                                            method: "editprofile",
                                            email:document.getElementById("email").value,
                                            username:document.getElementById("e_username").value,
                                            bio:document.getElementById("e_bio").value,
                                            password:document.getElementById("e_pass").value,
                                            id:id

                                        },
                                        success:function(resp4){
                                               if (resp4 == "success") {
                                                    alert ("Updated"); 
                                                }

                                        },
                                        error:function(error){
                                            console.log(error);
                                        }


                                    });
                                    }
                                    }

                                }
                    
                },
               
               error:function(error){
                console.log(error);   
               }
           }); 
               
        
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
                        var id = resp[i].id;
                        var thediv = document.getElementById("feed");  
                        var m_editdiv = document.getElementById("main_edit");
                        var div = document.createElement("div"); 
                        var editdiv = document.createElement("div"); 
                        var location = document.createElement("p");    
                        var h3 = document.createElement("p");
                        var image = document.createElement("img");
                        var tags = document.createElement("p");
                        var edit_butt = document.createElement("BUTTON");
                        var t = document.createTextNode("Edit");
                            edit_butt.appendChild(t); 
                        var delete_butt = document.createElement("BUTTON");
                        var t2 = document.createTextNode("Delete");
                            delete_butt.appendChild(t2); 
                        
                        var save_butt = document.createElement("BUTTON");
                        var t4 = document.createTextNode("Save");
                            save_butt.appendChild(t4); 
                        var input_title = document.createElement("input");
                                input_title.type = "text";
                                input_title.id="title_i"+id;
                            editdiv.appendChild(input_title);
                                input_title.value = resp[i].title;
                        
                        var file_butt = document.createElement("BUTTON");
                        var t7 = document.createTextNode("Upload New Image");
                        file_butt.appendChild(t7);
                        file_butt.setAttribute("type", "file");
                        editdiv.appendChild(file_butt);
                        
                        var input_location = document.createElement("input");
                        input_location.type = "text";
                        input_location.id="location_i"+id;
                        editdiv.appendChild(input_location);
                        input_location.value = resp[i].location;
                        
                        var input_tags = document.createElement("input");
                        input_tags.type = "text";
                        editdiv.appendChild(input_tags);
                        input_tags.id="tag_i"+id;
                        input_tags.value = resp[i].tags;

                        h3.innerHTML = resp[i].title;
                        image.src = "./img/1/" +resp[i].path;
                        location.innerHTML = resp[i].location;
                        tags.innerHTML = resp[i].tags;
                        edit_butt.class= id;
                        editdiv.class=id;
                        
                        feed.appendChild(div);

                        m_editdiv.appendChild(editdiv);

                        editdiv.appendChild(image);
                        editdiv.appendChild(save_butt);
                        
                        editdiv.style.marginLeft = "40%";
                        location.style.fontSize = "20pt";
                        location.style.marginTop = "0";
                        h3.style.fontSize = "20pt";
                        h3.style.marginBottom = "0";
                        tags.style.marginTop = "-20px";
                        tags.style.fontSize = "10pt";
                        save_butt.id = "savebutt"+id; 
         
 document.getElementById("savebutt"+id).onclick = function(){
     for(var i = 0; i<resp.length; i++){
       var id = resp[i].id;
           $.ajax({
               url:"controller/editimage.php",
                type: "POST",
                dataType: "json",
                        data: {
                            method: "editimage",
                            title:document.getElementById("title_i"+id).value,
                            location:document.getElementById("location_i"+id).value,
                            tags:document.getElementById("tag_i"+id).value,
                            id:id
                                 
                        },
                        success:function(resp4){
                               if (resp4 == "success") {
                                    alert ("Updated"); 
                                }
                        
                        },
                        error:function(error){
                            console.log(error);
                        }
                            
                            
                    });
                    }
                    }
                }  
            }
        });   
    });
    </script>


</html>