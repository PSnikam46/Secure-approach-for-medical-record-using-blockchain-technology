<?php
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
	
	$sa_email =  $_REQUEST['sa_email'];
	$sa_password =  $_REQUEST['sa_password'];

	$query = mysqli_query($con, "SELECT * from superadmin where sa_email like '".$sa_email."' and sa_password like '".md5($sa_password)."'");
	
	if(mysqli_num_rows($query) > 0){
		$row = mysqli_fetch_assoc($query);
		$_SESSION['sa_id'] = $row['sa_id']; 
		$_SESSION['sa_email'] = $row['sa_email'];
		
		echo "Login Successful.";
		
		header('Location: index.php');
	}else{
		echo "Login Fail.";
		echo "<a href='login.php' class='button'>Try Again</a>";
		//header('Location: index.php');
	}
?>