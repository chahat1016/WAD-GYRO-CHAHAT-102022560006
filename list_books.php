<?php
include 'connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// ============1============
$query = "
  SELECT b.id, b.title, b.author, b.stock, c.category_name
  FROM books b
  LEFT JOIN categories c ON b.category_id = c.id
  WHERE b.title LIKE '%$search%'
  ORDER BY b.id DESC
";
$result = mysqli_query($conn, $query);

$books = [];
while ($row = mysqli_fetch_assoc($result)) {
    $books[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="text-dark">Movie List</h3>
      <a href="form_create_book.php" class="btn btn-success">+ Add Movie</a>
    </div>

    <!-- ==================2================= -->
    <form action="list_books.php" method="GET" class="mb-3">
      <input type="text" name="search" class="form-control" placeholder="Search movie title..." value="<?= htmlspecialchars($search) ?>">
    </form>

    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-light text-center">
          <tr>
            <th>No</th><th>Title</th><th>Genre</th><th> Director</th><th>Release Year</th><th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($books) == 0): ?>
            <tr><td colspan="6" class="text-center text-muted">No data available</td></tr>
          <?php else: foreach ($books as $i => $book): ?>
            <tr>
              <td class="text-center"><?= $i + 1 ?></td>
              <td><?= htmlspecialchars($book['title']) ?></td>
              <td><?= htmlspecialchars($book['category_name']) ?></td>
              <td><?= htmlspecialchars($book['author']) ?></td>
              <td class="text-center"><?= (int)$book['stock'] ?></td>
              <td class="text-center">
                <a href="form_detail_book.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

