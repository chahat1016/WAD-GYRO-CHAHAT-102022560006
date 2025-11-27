<?php
// Include database configuration
// include_once("config.php");

// Fetch all members data from database
// $result = mysqli_query($conn, "SELECT * FROM members ORDER BY id DESC");
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="EAD Logo" class="logo">
  <h2>Cinema Ticket Booking Form</h2>

  <!-- Registration Form -->
 <form method="post" action="">
    
    <label>Name:</label>
    <input type="text" name="name" value="...">
    <span class="error">...</span>

    
    <label>Email:</label>
    <input type="text" name="email" value="...">
    <span class="error">...</span>

    <label>Phone Number:</label>
    <input type="text" name="number" value="...">
    <span class="error">...</span>
  
    <label>Select Movie:</label>
    <select name="movie">
      <option value="">-- Choose Movie --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <!-- <span class="error"><?php echo $movieErr;?></span> -->

     <label>Ticket Quantity:</label>
    <input type="text" name="quantity" value="...">
    <span class="error">...</span>

    <button type="submit">Book Ticket</button>
  </form>


  <h3 style="margin-top:20px;">Registered Members</h3>
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Select Movie</th>
      <th>Ticket Quantity</th>
      <th>Action</th>
    </tr>

    <?php  
   
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Example: assuming $members is an array of data fetched from a database
    if (!empty($members)) {
        foreach ($members as $member) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($member['id']) . "</td>";
            echo "<td>" . htmlspecialchars($member['name']) . "</td>";
            echo "<td>" . htmlspecialchars($member['email']) . "</td>";
            echo "<td>" . htmlspecialchars($member['number']) . "</td>";
            echo "<td>" . htmlspecialchars($member['movie']) . "</td>";
            echo "<td>" . htmlspecialchars($member['quantity']) . "</td>";
            echo "<td> <!-- add actions or buttons here --> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center;'>No members found.</td></tr>";
    }

} else {
    echo "<tr><td colspan='7' style='text-align:center;'>Invalid request method.</td></tr>";
}
?>

    
  </table>
</div>
</body>
</html>