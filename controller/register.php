<?php
include("../model/userdb.php");

if($_POST['method'] == "insert"){
    insert_user();   
}

?>