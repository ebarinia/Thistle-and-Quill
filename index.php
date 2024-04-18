<?php
include 'connect.php';

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
    include 'navbar.php';
    ?>

    <main class="main-content">
        <br><br><h1>Hi <?php echo htmlspecialchars($_SESSION["name"]); ?> and welcome to Thistle & Quill</h1>
        <p>The premier online destination where the rich tapestry of Scotland’s literary heritage is celebrated and shared with the world. <br>
        Here, you'll discover an exquisite collection of books penned by Scotland's finest authors, from time-honored classics to contemporary masterpieces. <br>
        Each book is a portal to the lush landscapes, deep-rooted traditions, and vibrant stories that make Scotland uniquely enchanting. <br>
        Whether you are a devoted bibliophile or a curious newcomer, Thistle & Quill invites you to explore and connect with the spirit of Scotland through every page.</p><br><br>
        
        <h2>New Releases</h2>
        <section class="book-list">
            <?php
            $sql = "SELECT * FROM books";
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM books WHERE name LIKE '%$search%'";
            }

            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="book-item">';
                    echo '<a href="book-detail.php?id=' . $row['id'] . '"><img src="' . $row['image'] . '" alt="' . $row['name'] . '" style="width:100%;"></a>';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>' . $row['author'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No books found";
            }
            ?>
        </section><br>
    </main>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>