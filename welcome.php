<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thistle & Quill</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'navbar.html';
    ?>

    <main class="welcome-content">
        <img src="https://images.squarespace-cdn.com/content/v1/5efb46cf46fb3d2f36091afa/1672757158060-JQ7ZYS3XDDPEKGWHWXBM/The+Thistle%2C+the+National+Flower+of+Scotland+and+how+it+became+the+Scottish+National+Flower.+%24+reasons+the+Thistle+is+like+the+People+of+Scotland.jpg" alt="image of a thistle"><br><br>
        <h1>Welcome to Thistle & Quill</h1>
        <p>The premier online destination where the rich tapestry of Scotland’s literary heritage is celebrated and shared with the world. 
        Whether you are a devoted bibliophile or a curious newcomer, Thistle & Quill invites you to explore and connect with the spirit of Scotland through every page.</p><br><br>
        <a href="index.php" class="account-btn">Get Started</a>
    </main>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>