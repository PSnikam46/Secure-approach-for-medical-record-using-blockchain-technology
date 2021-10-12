<?php

	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	

	function getPreviousHash(){
		global $con;
		$sql = "SELECT t_hash FROM `treatment` ORDER BY t_id DESC LIMIT 1";

		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			return $row['t_hash'];
		}else
			return "";
	}

	function isBlockValid(){
		//Remaining
		global $con;
		$sql = "SELECT * FROM treatment";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)>0){
			$data = array();
			while($row = mysqli_fetch_assoc($result))
				array_push($data, $row);

			$flag = true;
			//echo "<br/>";
			for($i=1; $i<sizeof($data); $i++){
				$v_hash = $data[$i]['t_hash'];
				
				$v_hash_compute = md5($data[$i]['t_id']." ".$data[$i]['prev_hash']." ".$data[$i]['d_id']." ".$data[$i]['t_details']." ".$data[$i]['p_id']." ".$data[$i]['t_time']);
				//echo $v_hash."  ==  ".$v_hash_compute."<br/>";
				if(strcmp($v_hash, $v_hash_compute) != 0){
					$flag = false;
					break;
				}

				$prev_hash = $data[$i]['prev_hash'];
				$prev_hash_compute = md5($data[$i-1]['t_id']." ".$data[$i-1]['prev_hash']." ".$data[$i-1]['d_id']." ".$data[$i-1]['t_details']." ".$data[$i-1]['p_id']." ".$data[$i-1]['t_time']);
				//echo $prev_hash."  ==  ".$prev_hash_compute."<br/><br/>";
				if(strcmp($prev_hash, $prev_hash_compute) != 0){
					$flag = false;
					break;
				}
			}
			return $flag;
		}else{
			return true;
		}
	}

	function updateHash($t_id, $t_hash){
		global $con;
		$sql = "UPDATE treatment SET t_hash = '".$t_hash."' WHERE t_id = ".$t_id;
		$result = mysqli_query($con, $sql);
		if($result != null)
			return true;
		else
			return false;
	}

	
	if(isset($_POST['p_id']) && isset($_POST['d_id']) && isset($_POST['t_details'])){

		echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

		$p_id = mysqli_real_escape_string($con, $_POST['p_id']);
		$d_id = mysqli_real_escape_string($con, $_POST['d_id']);
		$t_details = mysqli_real_escape_string($con, $_POST['t_details']);
		$t_time = time();
		if(!isBlockValid()){
			echo "<div class='alert alert-danger alert-dismissible'>
		            <strong>Missing!</strong> There is tampering in data. Contat System Admin now.
		            <a href='add_treatment.php' class='alert-link'>Click here</a> To try again.
		        </div>";
		}else{
			$prev_hash = getPreviousHash();

			$sql = "INSERT INTO `treatment`(`prev_hash`, `d_id`, `p_id`, `t_details`,`t_time`,`t_prescription_path`) VALUES ('".$prev_hash."', ".$d_id.", ".$p_id.", '".$t_details."', '".$t_time."',0)";
			$result = mysqli_query($con, $sql);

			if($result != null){
				$t_id = mysqli_insert_id($con);
				$t_hash = md5($t_id." ".$prev_hash." ".$d_id." ".$t_details." ".$p_id." ".$t_time);
				updateHash($t_id, $t_hash);
				echo "<div class='alert alert-success alert-dismissible' role='alert'>
                    Treatment Added Successfully. <a href='add_treatment.php' class='alert-link'>Add More Treatment</a>.
                 </div>";
			}else{
				echo "<div class='alert alert-danger alert-dismissible'>
		            <strong>Missing!</strong> Technical problem arises. Please try later.
		            <a href='add_treatment.php' class='alert-link'>Click here</a> To try again.
		        </div>";
			}
		}
		//isBlockValid();


		/**/
	}else{
		echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';
		echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='add_treatment.php' class='alert-link'>Click here</a> To try again.
        </div>";
	}



?>