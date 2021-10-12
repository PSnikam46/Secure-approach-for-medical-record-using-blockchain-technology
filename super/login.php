<html>
<head>
	<title>Login Page</title>
	<style type="text/css">
		body {
			width: 20%;
		    background-color: lightblue;
		    text-align: center;
		    margin-top: 15%;
		    margin-left: 40%;
		}
	</style>
</head>
	<body>
		<div style="float:left; width:140%; margin-bottom:20px; margin-left:-20%">
			<img src="css/logo.png" style="float:left; position:absulute;"/> 
			<div style="font-size: 25px; font-weight:bold; float:left; position:absulute; margin-top:10px; margin-left:20px; ">
				Offline Streaming
			</div>
		</div>
		<form id='login' action='login_back.php' method='post' accept-charset='UTF-8'>
			<fieldset>
			<legend>Login</legend><br/>

			<input type='hidden' name='submitted' id='submitted' value='1'/>
			 
			<label for='username' >Email*:</label>
			<input type='text' name='sa_email' id='username'  maxlength="50" /><br/><br/>
			 

			<label for='password' >Password*:&nbsp;&nbsp;</label>
			<input type='password' name='sa_password' id='password' maxlength="50" /><br/><br/>
			 
			<input type='submit' name='Submit' value='Submit' />
			 
			</fieldset>
		</form>
	</body>
</html>