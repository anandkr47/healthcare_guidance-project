<?php
session_start();
$mysqli = require __DIR__ . "/database.php";

// Check if user is logged in
if (isset($_SESSION["user_id"])) {
    // Fetch user information
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    // Fetch appointments of the current user
    $sql = "SELECT * FROM appointment WHERE user_id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Health Care And Guidence</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php if ($user && $result->num_rows > 0): ?>
    <h1>Cheerful Welcome</h1>
    <h3>Hello <?= htmlspecialchars($user["email"]) ?></h3>
    <h2>"It's my pleasure to extend a cheerful welcome to you! Your presence makes us very happy."</h2>
    <img src="images/welcome.jpg" alt="welcome" width="300">
    <h2>"Our desire is to extend a gracious and inclusive welcome to you. For now let's put aside our differences and instead celebrate what brings us together!"</h2>

    <?php while ($row = $result->fetch_assoc()): ?>
      <h2><?= htmlspecialchars($row["name"]) ?></h2>
      <p>Date: <?= htmlspecialchars($row["date"]) ?></p>
      <p>Time: <?= htmlspecialchars($row["time"]) ?></p>
      <p>Description: <?= htmlspecialchars($row["description"]) ?></p>
      <hr>
    <?php endwhile; ?>

     <?php else: ?>
        <h2>Dear guests,</h2>
        <h2> "you dont have any appointment."</h2>
        <img src="images/friends.jpg" alt="friends" width="320">
        <h2> "Join Us Take Your Appointment now"</h2>
        <a href="index.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
        
    <?} ?>   
   
       
        
     
    
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>
    
    
    
    
    
    
    
    
    
    
    
