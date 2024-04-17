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
        <title>Contact Us</title>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="contact-content">
        <form class="contact-form">
            <h2>Contact Us</h2>
            <p>If you have any feedback or request you'd like to share with us, let us know and we'll be back in touch with you as soon as we can!</p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required><br><br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="3" required></textarea><br>
            <button type="submit" class="account-btn">Send</button>
        </form>
    </div>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>