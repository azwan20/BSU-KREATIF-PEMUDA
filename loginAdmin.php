<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboardAdmin.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
?>
        <script>
            location.reload();
        </script>
<?php
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <!-- bostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        .login {
            width: 100%;
            height: 100vh;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFF;
        }

        .loginCard {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            height: 100%;
            background: rgba(39, 62, 159, 0.59);
            box-shadow: 0px 0px 4px 3px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            padding: 20px;
        }

        .loginsec {
            height: 50vh !important;
            padding-top: 50px;
        }

        .loginsec input {
            width: 100%;
            height: 40px;
            padding-left: 10px;
            border-radius: 30px;
            border: none;
            background: #FFF;
            box-shadow: 0px 0px 4px 3px rgba(0, 0, 0, 0.25);
            margin-top: 40px;
        }

        h5 a {
            text-decoration: none;
            color: red;
            background-color: #FFF;
            border-radius: 20px;
            padding: 10px;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 30px;
            border: none;
            background: #FF8A30;
            margin-top: 70px;
            color: #fff;
        }
    </style>
</head>

<body>
    <article>
        <div class="login">
            <div class="loginCard">
                <form action="" method="post">
                    <span style="text-align: center;">
                        <h2>LOGIN ADMIN</h2>
                    </span>
                    <div class="loginsec">
                        <input type="text" name="username" placeholder="username" id="">
                        <input type="password" name="password" placeholder="password" id="">
                    </div>
                    <span style="text-align: center;">
                        <h5><a href="login.php">LOGIN NASABAH</a></h5>
                    </span>
                    <span>
                        <button type="submit" name="submit">LOGIN</button>
                    </span>
                    <?php if (isset($error)) { ?>
                        <p style="color: red; text-align: center;">Login gagal. Periksa kembali username dan password.</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </article>
</body>

</html>