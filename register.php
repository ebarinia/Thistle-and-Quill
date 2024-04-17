<?php
include 'connect.php';

$email = $name = $password = $confirm_password = "";
$email_err = $name_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email address.";
    } else{
        $sql = "SELECT id FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email address is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";     
    } else{
        $name = trim($_POST["name"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($email_err) && empty($name_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (email, name, password) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_name, $param_password);
            $param_email = $email;
            $param_name = $name;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){
                session_start();
                $id = mysqli_insert_id($connect);
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $name;
                
                header("location: index.php");
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
    <title>Register - Thistle & Quill</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>

    <div class="login-container">
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">            
            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email address"><br><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Enter your password" required><br><br>
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Confirm your password" required><br><br>
            <button type="submit" class="account-btn">Register</button>
            <p>Already registered? <a href="login.php" style="text-decoration: underline;">SIGN IN</a></p>
        </form>
    </div>

    <footer>
        <p>© 2023 Thistle & Quill - A bookstore for Scottish authors - All rights reserved.</p>
    </footer>
</body>
</html>
