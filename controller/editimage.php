<?php
include("../model/editimage.php");
    
    if($_POST['method'] == "editimage"){
    edit_image(); 
}

 if($_POST['method'] == "deleteimage"){
    delete_image(); 
}
?>