<?php
include 'connect.php';

// ===============1==============
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ==============2=============
    $delete_query = "DELETE FROM books WHERE id=$id";
    $result = mysqli_query($conn, $delete_query);

    // =============3=============
    if ($result) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "<script>alert('Failed to delete book'); window.location='list_books.php';</script>";
    }
}

mysqli_close($conn);
?>
