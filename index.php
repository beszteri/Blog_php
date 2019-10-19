<?php

session_start();

if (isset( $_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo "You are logged in";
}

require_once('includes\db.php'); 
$db = new db();
$posts = $db->getAllPosts();

//melyik oldalon vagyunk jelenleg      
if(!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
        
//beállítja az sql LIMIT kezdőszámát
$thisPageFirstResult = ($page - 1) * $db->resultsPerPage;

//limitált találatok az adatbázisból
$limitedPosts = $db->limitTheResults($thisPageFirstResult, $db->resultsPerPage);
?>


<!DOCTYPE HTML>


<html>
	<head>
		<title>Szállás.hu Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
        
      
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

		<!-- Banner -->
			<section id="banner">
				<h1>Szállás.hu Blog</h1>
				<p>Built with PHP</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
                    <?php foreach($limitedPosts as $i) { ?>
						<article>
							<header>
								<h3><?php echo $i['title'] ?></h3>
                            </header>
                            <p><?php echo '<img height="150" width="150" src="data:image;base64,'. $i['image'] .' "> ' ?></p>
							<p><?php echo $i['posted_at'] ?></p>
							<footer>
								<?php echo '<a href="moreInfo.php?page=' .$i['id']. '" class="button special">' . 'More' . '</a>'?>
							</footer>
                        </article>
                        <?php } ?>
					</div>
				</div>
			</section>
            <!-- megjeleníti a linket az oldalakhoz -->
            <?php
            for($page = 1; $page <= $db->numberOfPages(); $page++) {
                echo '<a href="index.php?page=' . $page . '" class="button special">' . $page . '</a>';
            }
            ?>

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