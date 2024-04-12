<?php
require_once('includes/functions.php');
if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
    $delete = new postsFunctions;
    $dataDelete = $delete->deleteData($id, $table);
    if($dataDelete){
        $_SESSION['message'] = "Post deleted successfully";
        header("Location: all-posts.php");
    }else {
        $_SESSION["message"] = "Something went wrong. Try again later.";
        header("Location: all-posts.php");
    }
}
