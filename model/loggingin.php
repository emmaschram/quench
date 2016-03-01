<?php
include("connect.php");
include("../view/sessionstart.php");


$username = $_POST['username'];
$password = $_POST['password'];


$user_info = 'SELECT email, username, password, bio, id FROM users 
 WHERE password = "'.$password.'" AND username = "'.$username.'"';

$result = mysql_query($connect, $user_info);


if($result){
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
	$_SESSION['login'] = true;
	$_SESSION['email'] = $row['email'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];
    $_SESSION['bio'] = $row['bio'];
	$_SESSION['id'] = $row['id'];
	echo json_encode("success");
	} else {
		echo json_encode("Your username or password does not match our records. Please try again");	
	}
	
	
} else {
	$_SESSION['error'] = "Your username or password does not match";
	echo json_encode("error");	
	
	
}
?>