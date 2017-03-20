<?php
	
	unset($_SESSION['id']);
	unset($_SESSION['username']);

	header("Location:signin.php");

?>