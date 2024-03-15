<?php
    include("connection.php");

    if(isset($_POST['login'])){
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $password=mysqli_real_escape_string($con,$_POST['password']);

        $login=$con->query("SELECT * FROM `manager`");

        if(mysqli_num_rows($login)>0){
            while($row=mysqli_fetch_assoc($login)){
                if($username == $row['username'] && $password == $row['password']){
                    session_start();
                    $_SESSION['cargo_manager'] = $username;
                    header("Location: dashboard.php");
                }
                else if($username != $row['username'] && $password == $row['password']){
                    echo 
                    "
                        <script>
                            alert('Inavlid Username...');
                        </script>
                    ";
                }
                else if($username == $row['username'] && $password != $row['password']){
                    echo 
                    "
                        <script>
                            alert('Inavlid Password...');
                        </script>
                    ";
                }
                else if($username != $row['username'] && $password != $row['password']){
                    echo 
                    "
                        <script>
                            alert('Inavlid Username and Password...');
                        </script>
                    ";
                }

                else{
                    echo 
                    "
                        <script>
                            alert('Inavlid Data...');
                        </script>
                    ";
                }
            }
        }

        else{
            echo 
            "
                <script>
                    alert('No Users Available...');
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
    <title>Cargo Ltd - Login</title>
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
                    <h1>Cargo Ltd - Login</h1>
                    <div class="line"></div>
                </div>
                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter your Username..." required>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter your Password..." required>
                <button type="submit" name="login">Login</button>
                <p>Don't Have an account? <a href="signup.php">Signup</a></p>
            </form>
        </div>
    </div>
</body>
</html>