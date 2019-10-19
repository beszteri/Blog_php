<?php
require_once('includes\db.php'); 

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $post = $_POST['post'];
    $image = addslashes($_FILES['image']['tmp_name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);

    $db = new db();
    $db->edit($title, $post, $image, $id);
    header('Location: index.php');
}