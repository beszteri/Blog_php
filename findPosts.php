<?php

require_once('includes\db.php'); 

$name = $_POST['name'];
$db = new db();
$data = $db->findPosts($name);
echo json_encode($data);