<?php
include("connect.php");

    function insert_message(){
        global $db;
        $query = "INSERT INTO messages (message, user_id) VALUES ('".$_POST['message']."', '".$_POST['user_id']."')";

        $result = $db->query($query);
    }

    function get_messages(){
        global $db;
        $query = "SELECT messages.id AS msg_id, messages.message, users.username, messages.user_id,
        (SELECT COUNT(*) FROM likes WHERE likes.message_id = msg_id) AS likeNum
        FROM messages LEFT JOIN users ON users.id = messages.user_id";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

    function update_message(){
    }

    function delete_message(){
    }

    function insert_likes(){
        global $db;
        $query = "INSERT INTO likes (message_id, user_id) VALUES ('".$_POST['message_id']."', '".$_POST['user_id']."')";
        $result = $db->query($query);
    }   

    function get_likes(){
        global $db;
        $query = "SELECT * FROM likes";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

?>