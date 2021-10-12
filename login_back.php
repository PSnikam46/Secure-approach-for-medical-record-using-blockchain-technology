<?php
	//ob_start();
	session_start();
	include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$a_email = $_POST['a_email'];
	$a_password = $_POST['a_password'];

	$sql = "SELECT * FROM `admin` WHERE a_email like '".$a_email."' AND a_password like '".md5($a_password)."'";
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
		$_SESSION['a_id'] = $row['a_id']; 
		$_SESSION['a_name'] = $row['a_name'];
		$_SESSION['a_email'] = $row['a_email'];
		
		header('Location:index.php');
	}

?>