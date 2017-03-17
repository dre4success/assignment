<?php

		$db = mysqli_connect("localhost","root","dre","login") or die(mysqli_error());

		function authenticate() {

			if(!isset($_SESSION['id']) && !isset($_SESSION['username'])) {

				header("Location:login.php");
			}
		}

?> 