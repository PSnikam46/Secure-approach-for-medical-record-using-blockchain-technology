<html>
<head>
<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div style="float:left; width:100%; margin-bottom:20px;">
		<img src="css/logo.png" style="float:left; position:absulute;"/> 
		<div style="font-size: 25px; font-weight:bold; float:left; position:absulute; margin-top:40px; margin-left:20px; ">
			Pillai HOC College Of Engineering & Technology
		</div>
	</div>
	<div style="margin-top:10px;">
		<ul style=" list-style-type: none;">
			<li class="<?php if($page == 'index') echo 'selected-menu'; else echo 'nav'; ?>"><a href="index.php">All Teacher</a></li>
			<li class="<?php if($page == 'add') echo 'selected-menu'; else echo 'nav'; ?>"><a href="add_teacher.php">Add Teacher</a></li>
			<li class="nav"><a href="logout.php">Logout</a></li>
		</ul>
	</div>