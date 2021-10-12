<?php
	session_start(); 
	/*echo "HIII"; exit;*/
    if(!isset($_SESSION['sa_id'])){
        header("location: login.php");
    }
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

    $page = 'index';
    include 'header.php';

?>

	<div  style="float:left; width:100%;">
		<div  style="padding-top:30px; width:850px;  float:left; ">
			<div style="border: 1px solid; border-radius: 5px; border-color:#707979; padding:30px; margin-left:30px; position:absulute; margin-top:1px;">
				<div class="table-responsive">          
				  	<table class="table">
				    	<thead>
				      		<tr>
						        <th>ID</th>
						        <th>Name</th>
						        <th>Email</th>
				      		</tr>
				    	</thead>
				    	<tbody>
				    		<?php
				    			$sql = "SELECT `a_id`, `a_name`, `a_email` FROM `admin` WHERE 1";
				    			$r = mysqli_query($con, $sql);
				    			while($row = mysqli_fetch_assoc($r)){
				    				echo "<tr><td>".$row['a_id']."</td>";
				    				echo "<td>".$row['a_name']."</td>";
				    				echo "<td>".$row['a_email']."</td></tr>";
				    			}
				    		?>
				    	</tbody>
				    </table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>