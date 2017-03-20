<?php
		
		

		include 'config.php';
		
		
?>

<html>
<head>
<title>Login Page</title>
<style>
		.lo {width: 250px;
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
					
	     <center>
	     	<div>
	     	<a href="login.php">Click to Register</a>
			<a href="signin.php" id="what">Click to Sign In</a>
				</div>
				
			<h1>Register</h1>

			<?php

							#Validating my login form

							if(array_key_exists('register', $_POST)) {

								$error = array();

								if(empty($_POST['firstname'])) {

									$error[] = "Please Enter Your Firstname";
								} else
								{
									$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
								}

								if(empty($_POST['lastname'])) {

									$error[] = "Please Enter Your Lastname";
								} else
								{
									$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
								}

								if(empty($_POST['username'])) {

									$error[] = "Please Enter Your Username";
								} else
								{
									$username = mysqli_real_escape_string($db, $_POST['username']);
								}

								if(empty($_POST['email'])) {

									$error[] = "Please Enter Your Email Address";
								} else
								{
									$email = mysqli_real_escape_string($db, $_POST['email']);
								}

								if(empty($_POST['password'])) {

									$error[] = "Please Enter Your Password";
								} else

								{
									$password = md5(mysqli_real_escape_string($db, $_POST['password']));
								}

								if(empty($error)) {

										//To check if User does not already exist
									$user_exits = mysqli_query($db, "SELECT * FROM login WHERE username='".$username."' 
																							|| email='".$email."'"); 

									if(mysqli_num_rows($user_exits) == 0) { //user does not exist

												//Insert Into Database If User Does not Exist
											$insert = mysqli_query($db, "INSERT INTO login VALUES (NULL,
																									'".$firstname."',
																									'".$lastname."',
																									'".$username."',
																									'".$email."',
																									'".$password."')") or die(mysqli_error());

											$registered = "You have been registered";
											header("Location:login.php?registered=$registered");

									} else  //If user already exist
									{
										$already_exist = "Your Username or Email already exist";
										header("Location:login.php?already_exist=$already_exist");
									}
								} else
								{
									foreach($error as $err) {
										echo "<p> $err </p>";
									}
								}

							}

							if(isset($_GET['registered'])) {
								echo '<p>'.$_GET['registered'].'</p>';
							}
							if(isset($_GET['already_exist'])) {
								echo '<p>'.$_GET['already_exist'].'</p>';
							}

					?>

			<form action="" method="post">

			<p> <input  type="text" name="firstname" placeholder="  Enter Your Firstname  " class="lo"> </p>  	<!-- for User firstname -->

			<p> <input type="text" name="lastname" placeholder="   Enter Your Lastname " class="lo">  </p> 		<!-- for User lastname -->

			<p> <input type="text" name="username" placeholder="  Enter Username You Wish To Use " class="lo"> </p> 	<!-- for User username -->

			<p> <input type="email" name="email" placeholder="  Enter Your Email Address " class="lo"> </p> 	<!-- for User email -->

			<p> <input type="password" name="password" placeholder="  Enter Your password " class="lo"> </p>	 <!-- for User password -->

			<input type="submit" name="register" value="Click To Register">
				
			</form>
    </center>
</body>

</html>