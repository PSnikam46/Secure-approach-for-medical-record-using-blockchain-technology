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

    if(isset($_GET['t_id']) && isset($_FILES['t_prescription_path']['name'])){

    	$t_id = mysqli_real_escape_string($con, $_GET['t_id']);
       
        $timestamp = time();

        $target_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'treatment'.DIRECTORY_SEPARATOR;
        $p_path = $target_dir.basename($_FILES['t_prescription_path']['name']);
        $p_path_name =basename($_FILES['t_prescription_path']['name']);
        $p_path_file_type = pathinfo($p_path,PATHINFO_EXTENSION);
       
        if($p_path_file_type != "pdf" && $p_path_file_type != "PDF"){
            echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    You have to select only PDF File. <a href='all_treatment.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
        }else{
            if(move_uploaded_file($_FILES["t_prescription_path"]["tmp_name"], $p_path)){

                $sql = "UPDATE treatment SET t_prescription_path='".$p_path_name."' WHERE t_id='".$t_id."'";
                
                $result = mysqli_query($con, $sql);
                if($result != null){
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
                    Patient Added Successfully. <a href='all_treatment.php' class='alert-link'>Prescription Added Successfully</a>.
                 </div>";
                }else{
                    echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    Unable to add Prescription. <a href='all_treatment.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
                }
            }else{
                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                    Unable to upload pdf. <a href='all_treatment.php' class='alert-link'>TRY AGAIN</a>.
                 </div>";
            }
        }


    }else{
    	echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='all_treatment.php' class='alert-link'>Click here</a> To try again.
        </div>";
    }


?>