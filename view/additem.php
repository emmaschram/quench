<?php
include("sessionstart.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css">
        <link rel="stylesheet" type="text/css" href="./css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
        <section class='loginsection'>
            <img id='logo' src='./img/quenchlogo.png'/>
            <br/><br/><br/><br/>
            <button type="submit" id="addimage">Upload Image</button><br/><br/>

            <form id='myForm'>
            <input type='file' id='myfiles' multiple />    
            <button type="file" id="upload">Upload Image</button><br/><br/>    
            </form>
            <input type="text" id="name" placeholder="name"/><br/>
            <input type="text" id="location" placeholder="location"/><br/>
            <input type="text" id="tags" placeholder="tags"/><br/>
            <button type="submit" id="additem">Add Item</button><br/><br/><br/>
        </section>
        
        
    </body>
    
    <script>
    $(document).ready(function(){

    var myfiles = document.getElementById("myfiles");
    var upload = document.getElementById("upload");
    
    upload.onclick = function(e){
        e.preventDefault();
        
        var formData = new FormData();
        
        var allFiles = myfiles.files;
        
        for(var i = 0; i<allFiles.length; i++){
            var file = allFiles[i];
            
            if(file.type.match("image/*")){
                //this gets stored in the FILES container
                formData.append("images[]", file, "whatever");

                //stored in the POST or GET container
                formData.append("userid", 1);
                
                //stored in the POST or GET container
                formData.append("path", myfiles.files[0].name);
                
            } else {
                alert("IMAGE ONLY!");
                return false;
            }
            
            
        }
        
        var xhr = new XMLHttpRequest();
        
        xhr.open("POST", "view/upload.php", true);
        
        xhr.onload = function(){
            if(xhr.status == 200){
                alert("Loaded upload.php successfully");
            }
            if(xhr.status == 404){
                alert("PAGE NOT FOUND!!");
            }
        }
        
        xhr.send(formData);
        console.log(myfiles.files);
        console.log(formData);
    }
    
        
        document.getElementById('additem').onclick = function(){
            $.ajax({
                url:"controller/feed.php",
                type:"POST",
                dataType:"html",
                data: {
                    method:"insertimage",
                    title: document.getElementById('name').value,
                    location: document.getElementById('location').value,
                    tags: document.getElementById('tags').value,
                    path: document.getElementById('myfiles').files[0].name,
                    //user_id: sessionStorage.id
                    user_id: 1
                },
                success:function(resp){
                    alert("Image Inserted!");
                    console.log(resp);
                    //console.log("hi");
                    user_id = resp[0].id;
                }
            });
            
            }

        });

    </script>
</html>

