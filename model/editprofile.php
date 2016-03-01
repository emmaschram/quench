<?php
include("connect.php");

function get_profile(){
        global $db;
        $query = "SELECT users.id, users.email, users.username, users.password, users.bio FROM users";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

function edit_profile(){
        global $db;
        $query = "UPDATE users SET username = '".$_POST['username']."',  email = '".$_POST['email']."', password = '".$_POST['password']."', bio = '".$_POST['bio']."' WHERE id ='".$_POST['id']."'";
    
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
        
        //update info from users from the users table
}


?>