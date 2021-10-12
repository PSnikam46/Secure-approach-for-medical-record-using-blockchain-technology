<?php
	
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	$a_name = $_REQUEST['a_name'];
	$a_email = $_REQUEST['a_email'];
	$a_password = $_REQUEST['a_password'];
	$sql = "INSERT INTO `admin`(`a_name`, `a_email`, `a_password`) VALUES ('".$a_name."', '".$a_email."', '".md5($a_password)."')";
	$r = mysqli_query($con,$sql);
	if($r == null){
		echo 'Email ID already exist.';
		echo "<a href='add_teacher.php' class='button'>Try Again</a>";
	}
	else{
		echo "Teacher added successfully.";
		echo "<a href='add_teacher.php' class='button'>Add another Teacher</a>";
	}
	/*echo '<script language="javascript">';
	echo 'alert("message successfully sent")';
	echo '</script>';*/

?>