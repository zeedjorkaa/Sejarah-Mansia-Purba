    <?php
require "connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registrasi</title>
        <link class="icon" rel="icon" href="img/Car Point-modified.png" type="image/x-icon" />
        <link rel="stylesheet" href="style1.css" />
    </head>

    <body>
        <form action="" method="post">
            <h1>Register</h1>
            <label for="name">Username</label><br />
            <input class="box1" type="text" name="username" id="name" placeholder="Enter Name" /><br />
            <label for="email">Email</label><br />
            <input class="box1" type="email" name="email" id="email" placeholder="Enter Email"
                autocomplete="off" /><br />
            <label for="email">Password</label><br />
            <input class="box1" type="password" name="password" id="password" placeholder="Enter Password" /><br /><br>
            <div class="submit">
                <input class=" btn" type="submit" name="submit" value="Done">
                <button class="btn"><a style="color: black;" href="login.php">Login</a></button>

            </div>
            <div><br>

                <?php
        if (isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            echo "Maaf Anda Tidak Bisa Registrasi, Karena Email Sudah Tersedia";
        } else {
            $queryInsert = mysqli_query($con, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$encryptedPassword')");

        if($queryInsert) {
            echo "Register Succes";
        }
        }
        }
        ?>

            </div>
        </form>

    </body>

    </html>