<?php
include("connect.php");

    function insert_image(){
        global $db;
        $query = "INSERT INTO images (user_id, location, title, path, tags) VALUES ('".$_POST['user_id']."', '".$_POST['location']."', '".$_POST['title']."', '".$_POST['path']."', '".$_POST['tags']."')";

        $result = $db->query($query);
    }

    function get_feed(){
        global $db;
        $query = "SELECT images.user_id, images.location, images.title, images.path, images.tags FROM images";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

    function update_image(){
        //update info from users from the users table
    }

    function delete_image(){
        //remove a row of user from the users table
    }

?>