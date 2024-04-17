<?php
include 'connect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result);
    } else {
        echo "No book found";
        exit;
    }
} else {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail - Thistle & Quill</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="main-content">
        <div class="book-detail">
        <img src="<?php echo $book['image']; ?>" alt="Book Cover" class="book-cover">
        <div class="book-info">
            <h2><?php echo $book['name']; ?><br></h2> 
            <p>by <b><?php echo $book['author']; ?></b></p>
            <p>Published by <b><?php echo $book['publisher']; ?></b></p>
            <p>Price: <b>£<?php echo $book['price']; ?></b></p>
            <p>Synopsis: <?php echo $book['synopsis']; ?></p>
            <a href="basket.php" class="account-btn">Add to Basket</a>
            <a href="index.php" class="account-btn">Back</a>
        </div>
</div>
    </div>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>
</button>