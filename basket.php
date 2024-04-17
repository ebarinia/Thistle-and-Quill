<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
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
    <title>Thistle & Quill - Basket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="main-content">
        <h2>Your Basket</h2>
        <div class="basket-item">
            <img src="img/books/grief.jpg" alt="Book Title" class="book-image" style="width: 10%;">
            <span>£14.37</span>
            <button class="remove-btn">Remove</button>
        </div>
        <div class="basket-item">
            <img src="img/books/because.jpg" alt="Book Title" class="book-image" style="width: 10%;">
            <span>£7.99</span>
            <button class="remove-btn">Remove</button>
        </div>
        <div>
            <span><strong>Total: £22.36</strong></span>
            <button class="account-btn">Checkout</button>
        </div>
    
    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>
</button></a>