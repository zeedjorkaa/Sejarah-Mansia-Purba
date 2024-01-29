<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link class="icon" rel="icon" href="img/Car Point-modified.png" type="image/x-icon" />
    <link rel="stylesheet" href="style1.css" />
</head>

<body>
    <form action="" method="post">
        <h1>Login</h1>
        <label for="name">Username</label><br />
        <input class="box1" type="text" name="username" id="name" placeholder="Enter Name" /><br />
        <label for="email">Email</label><br />
        <input class="box1" type="email" name="email" id="email" placeholder="Enter Email" autocomplete="off" /><br />
        <label for="email">Password</label><br />
        <input class="box1" type="password" name="password" id="password" placeholder="Enter Password" /><br />
        <div class="submit">
            <input class="btn" type="submit" name="submit" value="Done">
            <button class="btn"><a style="color: black;" href="register.php">Regist</a></button>
        </div>
        <br>
        <div class="php">
            <?php
            if (isset($_POST['submit'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
                $count = mysqli_num_rows($query);

                if ($count > 0) {
                    $data = mysqli_fetch_array($query);
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['Logged_in'] = true;
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['username'] = $data['username'];

                        header('Location: index.php');
                    } else {
                        echo "Password Salah";
                    }
                } else {

                    echo "Your Account Not Regist";
                }
            }
            ?>
        </div>
    </form>


</body>

</html>