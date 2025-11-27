<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
$query = "
  SELECT b.id, b.title, b.author, b.stock, c.category_name
  FROM books b
  LEFT JOIN categories c ON b.category_id = c.id
  WHERE b.id = $id
";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <?php if (!$book): ?>
    <div class='alert alert-danger text-center'><h3>Movie not found!</h3></div>
  <?php else: ?>
    <div class="container mt-5">
      <h1 class="text-center mb-4">Movie Details</h1>
      <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?= htmlspecialchars($book['title']) ?>" disabled>
          <label>Movie Title</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?= htmlspecialchars($book['category_name']) ?>" disabled>
          <label>Genre</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?= htmlspecialchars($book['author']) ?>" disabled>
          <label>Director</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?= (int)$book['stock'] ?>" disabled>
          <label>Release Year</label>
        </div>
        <a href="form_update_book.php?id=<?= $book['id'] ?>" class="btn btn-warning mb-2 w-100">Edit</a>
        <a href="delete.php?id=<?= $book['id'] ?>" class="btn btn-danger w-100" onclick="return confirm('Delete this book?')">Delete</a>
      </div>
    </div>
  <?php endif; ?>
</body>
</html>
