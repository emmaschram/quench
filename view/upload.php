<?php
    //echo "YOU've FOUND ME";
    var_dump($_POST);
    var_dump($_FILES);
    
    //if the directory doesn't exist
    if(!is_dir("../img/".$_POST['userid'])){
        mkdir("../img/".$_POST['userid'], 0755);
    }

   
   if(move_uploaded_file($_FILES["images"]["tmp_name"][0], "../img/'.$_POST['userid'].'/'.$_POST['path'].'")){
        //include the database file
        //use the insert function
    };


/*$filename = substr(md5(rand()), 0, 20);
    move_uploaded_file($_FILES["images"]["tmp_name"][0], "../img/".$_POST['userid']."/".$filename.".jpg");
*/

    include("../model/msgdb.php");
    //do the database
?>