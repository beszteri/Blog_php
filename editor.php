<?php
session_start();

if (!isset( $_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
	header("location: login.php");
}
require_once('includes\db.php'); 

$db = new db();
$data = $db->getAllPosts();
?>



<!DOCTYPE HTML>

<html>
	<head>
		<title>Editor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
	<script src="main.js"></script>


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
						<h2>Elements</h2>
						<p>Aliquam erat volutpat nam dui </p>
					</header>

				<!-- Content -->
					<h2 id="content">Create new Blog</h2>
					<p>
						<form action="insert.php" method="POST" enctype="multipart/form-data">
        					<input type="text" placeholder="Title" name="title">
							<input type="text" placeholder="Post" name="post">
							<input type="file" name="image">
        					<input type="submit" value="Upload" name="insert" class="button special">
    					</form>
					</p>
					<div class="row">
						<div class="6u 12u$(small)">
							<h3>Edit an older post</h3>
							<p>
							<form action="edit.php" method="POST" enctype="multipart/form-data">
								<input type="number" placeholder="Post id" name="id">
								<input type="text" placeholder="Title" name="title">
								<input type="text" placeholder="Post" name="post">
								<input type="file" name="image">
								<input type="submit" value="Edit" name="edit" class="button special">
    						</form>
							</p>
						</div>
						<div class="6u$ 12u$(small)">
							<h3>Find a post</h3>
							<p>
							<form method="POST">
								<input type="text" name="name" placeholder="Search Posts" onkeyup="searchPosts(this.value)">
							</form>    
							<div class="data-wrapper">
								<table>
									<thead>
										<tr>
											<th>Id</th>
											<th>Title</th>
										</tr>
									</thead>
									<tbody class="data-table">
										<?php foreach($data as $i) { ?>
										<tr>
											<td><?php echo $i['id'] ?></td>
											<td><?php echo $i['title'] ?></td>
											<td><?php echo $i['post'] ?></td>
										<tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							</p>
						</div>
						<!-- Break -->
						<div class="4u 12u$(medium)">
							<h3>Interdum sapien gravida</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						</div>
						<div class="4u 12u$(medium)">
							<h3>Faucibus consequat lorem</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						</div>
						<div class="4u$ 12u$(medium)">
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						</div>
					</div>
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