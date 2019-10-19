<?php
require_once('includes\db.php'); 

if(isset($_POST['insert'])) {

    $title = $_POST['title'];
    $post = $_POST['post'];
    $image = addslashes($_FILES['image']['tmp_name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);


    $db = new DB();
    $db->insert($title, $post, $image);

    header('Location: index.php');
}