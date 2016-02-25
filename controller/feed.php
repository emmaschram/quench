<?php
include("../model/feed.php");

if($_POST['method'] == "insert"){
    insert_image();   

}

if($_POST['method'] == "getfeed"){
    get_feed();   
}
?>