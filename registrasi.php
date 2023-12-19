<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['login'])) {
    header("Location: data_peminjaman.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql6 = "insert into registrasi  (f_name, l_name, username, password) VALUES ('$fName', '$lName', '$username', '$password')";
    if (mysqli_query($conn, $sql6)) {
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
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
                        <h2>REGISTRASI</h2>
                    </span>
                    <div class="loginsec">
                        <span class="d-flex">
                            <input type="text" name="fName" placeholder="First Name" id="">
                            <input type="text" name="lName" placeholder="Last Name" id="">
                        </span>
                        <input type="text" name="username" placeholder="Username" id="">
                        <input type="password" name="password" placeholder="Password" id="">
                        <p>Sudah punya akun?<a href="login.php">Login disini</a> </p>
                    </div>
                    <span>
                        <button type="submit" name="submit">REGISTRASI</button>
                    </span>
                </form>
            </div>
        </div>
    </article>
</body>

</html>