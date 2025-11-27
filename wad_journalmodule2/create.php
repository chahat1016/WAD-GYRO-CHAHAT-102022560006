<?php
include 'connect.php';

// ==============1===============
if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categoryId = intval($_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $stock = intval($_POST['stock']);

    // ===============2===============
    $query = "INSERT INTO books (title, category_id, author, stock) 
              VALUES ('$title', '$categoryId', '$author', '$stock')";
    $result = mysqli_query($conn, $query);

    // ==============3================
    if ($result) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "<script>alert('Failed to add book'); window.location='list_books.php';</script>";
    }
}
?>
