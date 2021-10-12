<?php

	session_start(); 
    if(!isset($_SESSION['a_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';

    echo '<html><head><title></title>
				<link rel="stylesheet" href="dist/css/main.css">
				<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

    if(isset($_POST['p_name']) && isset($_POST['p_email']) && isset($_POST['p_phone']) && isset($_POST['p_password'])  && isset($_FILES['p_photo']['name']) && isset($_POST['p_address']) ){

    	$p_name = mysqli_real_escape_string($con, $_POST['p_name']);
        $p_email = mysqli_real_escape_string($con, $_POST['p_email']);
        $p_phone = mysqli_real_escape_string($con, $_POST['p_phone']);
        $p_password = mysqli_real_escape_string($con, $_POST['p_password']);
        $p_address = mysqli_real_escape_string($con, $_POST['p_address']);
        

        $timestamp = time();

        $target_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'patient'.DIRECTORY_SEPARATOR;
        $p_path = $target_dir .$timestamp.'_'.basename($_FILES['p_photo']['name']);
        $p_path_name = $timestamp.'_'.basename($_FILES['p_photo']['name']);

        $p_path_file_type = pathinfo($p_path,PATHINFO_EXTENSION);

        if($p_path_file_type != "PNG" && $p_path_file_type != "JPG" && $p_path_file_type != "JPEG" && $p_path_file_type != "jpg" && $p_path_file_type != "png" && $p_path_file_type != "jpeg"){
            echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    You have to select only IMAGE File. <a href='add_patient.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
        }else{
            if(move_uploaded_file($_FILES["p_photo"]["tmp_name"], $p_path)){

                $sql = "INSERT INTO `patient`(`p_name`, `p_email`, `p_phone`, `p_password`, `p_photo`, `p_address`) VALUES ('".$p_name."', '".$p_email."', '".$p_phone."', '".md5($p_password)."', '".$p_path_name."', '".$p_address."')";
                
                $result = mysqli_query($con, $sql);
                if($result != null){
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
                    Patient Added Successfully. <a href='add_patient.php' class='alert-link'>Add More Patients</a>.
                 </div>";
                }else{
                    echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    Email ID or phone number already present in system. <a href='add_patient.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
                }
            }else{
                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    Unable to upload Photo. <a href='add_patient.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
            }
        }


    }else{
    	echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='add_patient.php' class='alert-link'>Click here</a> To try again.
        </div>";
    }


?>