<?php
// Start the session
session_start();

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM mem_db WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
        $user = $result->fetch_assoc();

 
        if (password_verify($password, $user['password'])) {
       
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

         
            header("Location: home.php"); 
            exit(); 
        } else {
           
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artriffle Local Art Store</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="icon" type="image/icon" href="PICTURES/iconlogo.png">
</head>
<body style="margin: 0; padding: 0; font-family: Verdana; background-color: antiquewhite; display: flex; justify-content: center; align-items: center; height: 100vh; overflow-x: hidden;">

    <div class="login">
        <h2>LOG IN</h2>
        
        <?php if (isset($error_message)) { ?>
            <div style="color: red; text-align: center; margin-bottom: 10px;">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <form class="login-form" method="post" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        
            <input type="submit" name="submit" value="Login" class="login-btn">
        </form>
        
        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
        
        <div class="signup-link">
            <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
        </div>
    </div>

</body>
</html>
