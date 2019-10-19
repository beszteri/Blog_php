<?php

session_start();

$name = "lajka89";
$password = "123";

if (isset( $_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("location: editor.php");
}

if (isset($_POST['name']) && isset($_POST['password'])) {
	if ($_POST['name'] == $name && $_POST['password'] == $password) {
		$_SESSION['loggedin'] = true;
		header("Location: editor.php");
	}
}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Generic - Theory by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
		<header id="header">
				<div class="inner">
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="login.php">Login</a>
						<a href="editor.php">Editor</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Login</h2>
					</header>
					<form method="post" action="login.php">
						name: <br>
						<input type="text" name="name"><br>
						password: <br>
						<input type="password" name="password"><br>
						<input type="submit" value="Login" class="special"><br>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<ul class="icons">
						<li><a href="https://hu-hu.facebook.com/www.szallas.hu" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						</ul>
					</div>
				</div>
			</footer>
	</body>
</html>