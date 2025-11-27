<?php
include 'connect.php';

// ==============1===============
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categoryId = intval($_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $stock = intval($_POST['stock']);

    // ===============2===============
    $query = "UPDATE books 
              SET title='$title', category_id='$categoryId', author='$author', stock='$stock' 
              WHERE id=$id";

    $result = mysqli_query($conn, $query);

    // =============3=============
    if ($result) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "<script>alert('Failed to update book'); window.location='list_books.php';</script>";
    }
}
?>
