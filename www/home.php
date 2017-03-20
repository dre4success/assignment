
<?php
		session_start();

		include 'config.php';

		$id = $_SESSION['id'];
		$username = $_SESSION['username'];
?>

<html>
<head>
</head>
<title>Home</title>
<style>
	span{color: blue}
</style>

<body>
	
		<?php
				echo "<h1>Welcome <span>$username</span>, to Swap Space  </h1>";
		?>

	<a href="logout.php">logout</a>	
</body>
</html>