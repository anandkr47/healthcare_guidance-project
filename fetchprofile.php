<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
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
    
   
    
    <?php if (isset($user)): ?>
        <h1>Cheerful Welcome</h1>
        <h3>Name: <?= htmlspecialchars($user["name"]) ?></h3>
        <h3>Email: <?= htmlspecialchars($user["email"]) ?></h3>
        <h3>Gender: <?= htmlspecialchars($user["gender"]) ?></h3>
        <h3>Date Of Birth: <?= htmlspecialchars($user["Dob"]) ?></h3>
        
        <h2> "It's my pleasure to extend a cheerful welcome to you!
             Your presence makes us very happy."
         </h2> 
         <img src="images/welcome.jpg" alt="welcome"width="300">
        <h2> "Our desire is to extend a gracious and inclusive welcome to you. 
             For now let's put aside our differences and instead celebrate what brings us together!"
        </h2>
        
        <p><a href="logout.php"><button>logOut</button></a></p>
        
   
        
    <?php endif; ?>
    
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>
    
    
    
    
    
    
    
    
    
    
    