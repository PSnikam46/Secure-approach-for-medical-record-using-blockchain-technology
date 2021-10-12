<?php
	session_start(); 
	/*echo "HIII"; exit;*/
    if(!isset($_SESSION['sa_id'])){
        header("location: login.php");
    }
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';


	$page = 'add';
	include 'header.php';

?>
	<div  style="float:left; width:100%;">
		<div  style="padding-top:30px; width:850px;  float:left; ">
			<div style="border: 1px solid; border-radius: 5px; border-color:#707979; padding:30px; margin-left:30px; position:absulute; margin-top:1px;">
				<form action="add_teacher_back.php" method="post">
					Name &nbsp;&nbsp;&nbsp;: &nbsp;<input type="text" class="textbox" name="a_name" required><br/><br/>
					Email &nbsp;&nbsp;&nbsp;: &nbsp;<input type="email" class="textbox" name="a_email" required><br/><br/>
					Password &nbsp;&nbsp;&nbsp;: &nbsp;<input type="password" class="textbox" name="a_password" required><br/><br/>
					
					<button type="submit" class="btn btn-success">Add Teacher</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>