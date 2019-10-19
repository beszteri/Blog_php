<?php
require_once('includes\db.php'); 

if(!isset($_GET['page'])) {
    header("location: index.php");
} 
$page = $_GET['page'];

$db = new db();
$post = $db->getPostById($page);

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>More Info</title>
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
                        <a href="logout.php">Logout</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><?php echo $post[0]['title'] ?></h2>
						<p><?php echo $post[0]['posted_at'] ?></p>
					</header>

				<!-- Content -->
					<h2 id="content"><?php echo $post[0]['post'] ?></h2>
					<p>
					<?php echo '<img height="150" width="150" src="data:image;base64,'. $post[0]['image'] .' "> ' ?>
                    </p>
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