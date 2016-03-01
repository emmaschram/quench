<?php
include("sessionstart.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" type="text/css" href="./css/normalize.css-master/normalize.css">
        <link rel="stylesheet" type="text/css" href="../css/my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
         <section class='loginsection'>
             
            <form id='myForm'>
                <input type='file' id='myfile' />
                <button id='upload'>Change Profile Picture</button>
             </form>
             </br>
             
             <input type="text" id="e_username" placeholder="Change Your Username" >
             <input type="text" id="e_bio" placeholder="Edit Your Biography" >
             <input type="text" id="e_pass" placeholder="Change Your Password" >
             <input type="text" id="ec_pass" placeholder="Confirm your changed password" >
             <button type="submit">Confirm Your Changes</button>
        
        </section>
        
    </body>


<script>
    var upload = document.getElementById("upload");
    var files = document.getElementById("myfile");
    
    upload.onclick = function(e){
        //refreshes page
        e.preventDefault();
        
        //Upload the files using another form of ajax
        var formData = new FormData();
        
        var xhr = new XMLHttpRequest();
        
        var allfiles = files.files;
        console.log(allfiles);
        for(var i=0; i<allfiles.length; i++){
        
            //Get individual files with var
            var e_file = allfiles[i];
            
            if(!e_file.type.match("images/*")){
                alert("NO");  
                return false;
            }
            formData.append("images[]", e_file, e_file.name);
            formData.append("userid", 1);
            
            xhr.open("POST", "upload.php", true);
            
            xhr.onload = function(){
                if(xhr.status == 200){
                    alert("loaded properly");   
                }
            }
            
            xhr.send(formData);
        }
        
    }
</script>
</html>