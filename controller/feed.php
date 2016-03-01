<?php
include("../model/feed.php");

if($_POST['method'] == "insertimage"){
    insert_image();   
}

if($_POST['method'] == "getfeed"){
    get_feed();  
    
    //if($_POST['method'] == "editimage"){
    //edit_image(); 
}


?>