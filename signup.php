<?php
    include("connection.php");

    if(isset($_POST['signup'])){
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $tel=mysqli_real_escape_string($con,$_POST['tel']);

        $signup=$con->query("INSERT INTO `manager` VALUES ('','$username','$password','$email','$tel')");

        if($signup){
            $_SESSION['cargo_manager']=$username;
            header("Location: index.php");
        }

        else{
            echo 
            "
                <script>
                    alert('Failed to create new account...');
                </script>
            ";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">

</head>
<body>
    <div class="login-container">
        <div class="left-container">
            <img src="./imgs/1.png" alt="">
        </div>
        <div class="right-container">
            <form action="" method="post">
                <div class="title">
                    <h1>Cargo Ltd - SignUp</h1>
                    <div class="line"></div>
                </div>
                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter your Username..." required>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter your Password..." required>
                <label>Email:</label>
                <input type="email" name="email" placeholder="Enter your Email..." required>
                <label>Tel:</label>
                <input type="tel" name="tel" placeholder="Enter your Tel..." min="10" max="10" required>
                <button type="submit" name="signup">Signup</button>
                <p>Already Have an account? <a href="index.php">Signin</a></p>
            </form>
        </div>
    </div>
</body>
</html>