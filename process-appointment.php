<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["phone"]) < 10) {
    die("Phone number  must be at least 10 characters");
}

if (empty($_POST["age"])) {
    die("age is required");
}
if (empty($_POST["doctor"])) {
    die("choose doctor is required");
}
if (empty($_POST["message"])) {
    die("message is required");
}

$date=date('y-m-d',strtotime($_POST["date"]));


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO appointment (name, email, phone, date, age, doctor, message)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["name"],
                  $_POST["email"],
                  $_POST["phone"],
                  $date,
                $_POST["age"],
                $_POST["doctor"],
                $_POST["message"]);
                  
if ($stmt->execute()) {

    header("Location: appointment-sucess.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}







