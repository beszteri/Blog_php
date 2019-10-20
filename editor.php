<?php
session_start();

//session vizsgálata
if (!isset( $_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
	header("location: login.php");
}
require_once('includes\db.php'); 

//ha nincs keresve, akkor üres tömböt ad
$db = new db();
$data = [];
if (isset($_GET['findPost'])) {
    $data = $db->findPosts($_GET['findPost']);
} 
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
						<h2>CRUD page</h2>
						<p>Here you can find, update, create and delete posts</p>
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
							<form method="GET">
								<!-- a keresési mezőben marad a keresett szöveg részlet -->
								<input type="text" name="findPost" placeholder="Search Posts"
								value="<?php if(isset($_GET['findPost'])) echo $_GET['findPost'] ?>">
								<input type="submit" value="Search" class="special">
							</form>    
							<div class="data-wrapper">
								<table>
									<thead>
										<tr>
											<th>Id</th>
											<th>Title</th>
											<th>Post</th>
										</tr>
									</thead>
									<tbody class="data-table">
									<!-- megjeleníti egy táblázatban a keresett posztokat -->
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
						<div class="6u$ 12u$(small)">
							<h3>Delete Post</h3>
							<p>
								<form action="delete.php" method="POST">
								<input type="number" placeholder="Post id" name="id">
								<input type="submit" value="Delete" name="deletePost" class="special">
							</p>
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