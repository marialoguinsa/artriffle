<?php
// Start session
session_start();

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $avatar = $_FILES['avatar'];

    if ($password !== $cpassword) {
        $error_message = "Passwords do not match!";
    } else {
       
        $check_query = "SELECT * FROM mem_db WHERE email = '$email' OR username = '$username'";
        $result = $conn->query($check_query);
        
        if ($result->num_rows > 0) {
            
            $error_message = "This email or username is already taken. Please create another one.";
        } else {
           
            $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
            if (in_array($avatar['type'], $allowed_types)) {
               
                if ($avatar['size'] < 10485760) {  
             
                    $avatar_name = time() . '_' . basename($avatar['name']);
                    $upload_path = 'avatars/' . $avatar_name;

                    // Move the file to the avatars folder
                    if (move_uploaded_file($avatar['tmp_name'], $upload_path)) {
                        // Insert user data into the database
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO mem_db (name, email, address, number, username, password, avatar) 
                                VALUES ('$name', '$email', '$address', '$number', '$username', '$hashed_password', '$avatar_name')";

                        if ($conn->query($sql) === TRUE) {
                            header("Location: log-in.php");
                            exit();
                        } else {
                            $error_message = "Error: " . $conn->error;
                        }
                    } else {
                        $error_message = "Failed to upload avatar!";
                    }
                } else {
                    $error_message = "File size exceeds the maximum limit of 10MB!";
                }
            } else {
                $error_message = "Only JPG, JPEG, and PNG files are allowed!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Artriffle Local Art Store </title>
   <link rel="stylesheet" type="text/css" href="design.css">
   <link rel="icon" type="image/icon" href="PICTURES/iconlogo.png">
</head>
<body style="margin: 0; padding: 0; font-family: Verdana; background-color: antiquewhite; display: flex; justify-content: center; align-items: center; height: 100vh; overflow-x: hidden;">

<div class="form-box">
    <form action="sign-up.php" method="post" enctype="multipart/form-data">
        <h3>Sign Up Now</h3> 
        <input type="text" name="name" required placeholder="Fullname">
        <input type="email" name="email" required placeholder="Email">
        <input type="text" name="address" required placeholder="Address">
        <input type="tel" name="number" required placeholder="Number">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <input type="password" name="cpassword" required placeholder="Confirm Password">
        <label for="avatar">Upload your profile avatar:</label>
        <input type="file" name="avatar" accept="image/*" required>
        <input type="submit" name="submit" value="Sign Up" class="form-btn">
        <p>Already have an account? <a href="log-in.php">Login now</a></p>

        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
    </form>
</div>

</body>
</html>
