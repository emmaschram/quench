
<?php
include("connect.php");


function edit_image(){
        global $db;
        $query = "UPDATE images SET location = '".$_POST['location']."',  title = '".$_POST['title']."', path = '".$_POST['path']."', tags = '".$_POST['tags']."' WHERE id ='".$_POST['id']."'";
        
        //update info from users from the users table
}

    function delete_image(){
        global $db;
        //remove a row of user from the users table
    }

?>