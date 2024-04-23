<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'connect.php';

$name = $email =  $message = "";
$name_err = $email_err = $message_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email";
    } else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["message"]))){
        $message_err = "Please enter your message";
    } else{
        $message = trim($_POST["message"]);
    }

    if(empty($name_err) && empty($email_err) && empty($message_err)){
        $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_message);
            $param_name = $name;
            $param_email = $email;
            $param_message = $message;
            if(mysqli_stmt_execute($stmt)){
                header("location: contact.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
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
    include 'navbar.html';
    ?>

    <div class="contact-content">
        <form class="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Contact Us</h2>
            <p>If you have any feedback or request you'd like to share with us, let us know and we'll be back in touch with you as soon as we can!</p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email address" required><br><br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" value="<?php echo $message; ?>" rows="3" required></textarea><br>
            <button type="submit" class="account-btn">Send</button>
        </form>
    </div>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>