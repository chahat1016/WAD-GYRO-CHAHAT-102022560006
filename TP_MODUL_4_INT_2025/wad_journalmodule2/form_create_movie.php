<?php
include 'connect.php';

// ====================1================= 
// Get all categories from the categories table
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container py-5">
    <div class="card shadow p-4">
      <h3 class="mb-4 text-dark">Add New Book</h3>
      <form action="create.php" method="POST">
        <div class="form-floating mb-3">
          <!-- ====================2================= -->
          <input type="text" class="form-control" name="title" placeholder="Book Title" required>
          <label>Movie Title</label>
        </div>

        <div class="form-floating mb-3">
          <!-- ====================3================= -->
          <select class="form-select" id="selectCategory" name="category_id" required>
            <option value="" disabled selected> Select Genre </option>
            <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
              <!-- ====================4================= -->
              <option value="<?= $category['id'] ?>">
                <?= htmlspecialchars($category['category_name']) ?>
              </option>
            <?php endwhile; ?>
          </select>
          <label for="selectCategory">Genre</label>
        </div>

        <div class="form-floating mb-3">
          <!-- ====================5================= -->
          <input type="text" class="form-control" name="author" placeholder="Author" required>
          <label>Director</label>
        </div>

        <div class="form-floating mb-3">
          <!-- ====================6================= -->
          <input type="number" class="form-control" name="stock" placeholder="Stock" min="0" required>
          <label>Release Year</label>
        </div>

        <button type="submit" name="create" class="btn btn-primary">+ Add Movie</button>
      </form>
    </div>
  </div>
</body>
</html>
