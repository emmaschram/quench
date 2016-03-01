<?php
include("../model/editprofile.php");
    
    if($_POST['method'] == "editprofile"){
    edit_profile(); 
}

   if($_POST['method'] == "getprofile"){
    get_profile(); 
}

?>