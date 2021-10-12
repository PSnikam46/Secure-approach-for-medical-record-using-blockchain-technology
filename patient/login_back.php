<?php
	//ob_start();
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$p_email = $_POST['p_email'];
	$p_password = $_POST['p_password'];

	$sql = "SELECT * FROM `patient` WHERE p_email like '".$p_email."' AND p_password like '".md5($p_password)."'";
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		echo '<html><head><title></title>
				<link rel="stylesheet" href="dist/css/main.css">
				<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';
		echo "<div class='alert alert-danger alert-dismissible'>
                <strong>Error!</strong> Please check email ID and password you have entered.
                <a href='login.php' class='alert-link'>Click here</a> To try again.
            </div>";
	}else{
		//ob_start();
		$row = mysqli_fetch_assoc($result);
		$_SESSION['p_id'] = $row['p_id']; 
		$_SESSION['p_name'] = $row['p_name'];
		$_SESSION['p_email'] = $row['p_email'];
		$_SESSION['p_photo'] = $row['p_photo'];
		
		header('Location:index.php');
	}

?>