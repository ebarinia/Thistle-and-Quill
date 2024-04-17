<?php
include 'connect.php';

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$sessionId = session_id();

if(!isset($_SESSION['basket'][$sessionId])){
    $_SESSION['basket'][$sessionId] = array();
}

if(isset($_GET['add'])){
    $bookId = $_GET['add'];
    if(!in_array($bookId, $_SESSION['basket'][$sessionId])){
        $_SESSION['basket'][$sessionId][] = $bookId;
    }
}

$basketItems = array();
foreach($_SESSION['basket'][$sessionId] as $bookId){
    $sql = "SELECT * FROM books WHERE id = $bookId";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $basketItems[] = mysqli_fetch_assoc($result);
    }
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
        <?php foreach($basketItems as $item): ?>
            <div class="basket-item">
                <img src="<?php echo $item['image']; ?>" alt="Book Title" class="book-image" style="width: 10%;">
                <span>£<?php echo $item['price']; ?></span>
                <button class="remove-btn">Remove</button>
            </div>
        <?php endforeach; ?>
    </div>
    
    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>