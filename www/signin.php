<?php
	session_start();
	include 'config.php';

?>

<html>
<head>
<title>Sign In</title>
<style>
	.lo {width: 200px;
			height: 40px;
			border-radius: 10px}

	div {margin-top: 30px}

	a {color: black;
		font-weight: 700;
		font-style: italic;}

		#what{margin-left: 10px}
	
	
</style>
	


</head>

<body>
<center>	<div>
			<a href="login.php">Click To Register</a>
			<a href="signin.php" id="what">Click To Sign In</a>
			</div>
			<h1>Sign In</h1>

<?php

	if(array_key_exists('login', $_POST)){
		$error = array();

		if(empty($_POST['uname'])){
			$error[] = "Please enter your Username";
		
		}else{

			$uname = mysqli_real_escape_string($db, $_POST['uname']);
		}

		if (empty($_POST['pword'])){
			$error[] = "Please enter your Password";
		
		}else{

			$pword  = md5(mysqli_real_escape_string($db, $_POST['pword']));
		}

		if(empty($error)){ 
			
			$query = mysqli_query($db, "SELECT * FROM login WHERE
										username='".$uname."' AND
										password='".$pword."'")
										or die(mysqli_error($db));
			
			if(mysqli_num_rows($query) ==1){

				while($public_detail = mysqli_fetch_array($query)){

				$_SESSION['id'] = $public_detail['user_id'];
				$_SESSION['username'] = $public_detail['username'];

				header("Location:home.php");
			}
		}else{					
			
			$login_error="Invalid Username and/or Password";
			header("Location:signin.php?login_error=$login_error")	;
			}

		}else{ 
		
				foreach($error as $err){
					
					echo '<p>' .$err. '</p>';
					
					}
				}
	}


			if(isset($_GET['login_error'])){
				
				echo $_GET['login_error'];
			}

?>


<form action="" method="post">
	
	<p>Username: <input type="text" name="uname" placeholder="Enter your username" class="lo"></p>

	<p>Password: <input type="password" name="pword" placeholder="Enter your password" class="lo"></p>

	<input type="submit" name="login" value="Click to login">


</form>

</center>

</body>
</html>