<?php
require_once('includes\db.php'); 

if(isset($_POST['deletePost'])) {
    $id = $_POST['id'];

    $db = new DB();
    $db->deletePost($id);
    header('Location: editor.php');
}