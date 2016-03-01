<?php
include("connect.php");


function edit_profile(){
        global $db;
        $query = "UPDATE user SET username = '".$_POST['username']."',  email = '".$_POST['email']."', password = '".$_POST['password']."' WHERE id ='".$_POST['id']."'";
        
        //update info from users from the users table
}


?>