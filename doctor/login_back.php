<?php
	//ob_start();
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$d_email = $_POST['d_email'];
	$d_password = $_POST['d_password'];

	$sql = "SELECT * FROM `doctor` WHERE d_email like '".$d_email."' AND d_password like '".md5($d_password)."'";
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
		$_SESSION['d_id'] = $row['d_id']; 
		$_SESSION['d_name'] = $row['d_name'];
		$_SESSION['d_email'] = $row['d_email'];
		$_SESSION['d_photo'] = $row['d_photo'];
		
		header('Location:index.php');
	}

?>