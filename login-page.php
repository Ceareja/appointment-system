<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/appointment-system/vendor/bootstrap-5.3.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/appointment-system/vendor/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <!--  myCSS -->
    <link rel="stylesheet" href="/appointment-system/CSS/app.css">
    <title>Login</title>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="/appointment-system/script.js"></script>
</head>

<body style="overflow: hidden; font-family: 'Montserrat', sans-serif">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-sm-12 col-md-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 text-center">
                    <div class="admin-login-logo">
                        <img src="/appointment-system/images/logo.png" alt="logo">
                    </div>
                </div>
                <div class="col-md-12 text-center admin-loginform">
                    <h1>Brgy Rosario<br>Appointment System</h1>
                    <form method="POST" action="">
                        <input class="form-control" name="email" type="email" placeholder="Email Address" require>
                        <br>
                        <input class="form-control" name="password" type="password" placeholder="Password" require>
                        <br>
                        <button type="submit" name="submitEmailAndPassword" href="#" class="loginButton btn btn-primary">Login</button>
                        <button onclick="return backToLandingPage()" class="backButton btn btn-secondary">Back</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

<?php

$conn = new mysqli('localhost', 'root', '', 'appointment_system');

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

$submittedEmail = $_POST['email'] ?? null;

$sqlEmail = "SELECT * FROM admin WHERE email = ?";
$stmtEmail = $conn->prepare($sqlEmail);
$stmtEmail->bind_param("s", $submittedEmail);
$stmtEmail->execute();
$resultEmail = $stmtEmail->get_result();

$submittedPassword = $_POST['password'] ?? null;
$sqlPassword = "SELECT * FROM admin WHERE password=?";
$stmtPassword = $conn->prepare($sqlPassword);
$stmtPassword->bind_param("s", $submittedPassword);
$stmtPassword->execute();
$resultPassword = $stmtPassword->get_result();

if (isset($_POST['submitEmailAndPassword'])) {
    if ($resultEmail->num_rows > 0 && $resultPassword->num_rows > 0) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<script>alert("Email & Password not matched");</script>';
    }
}

$stmtEmail->close();
$stmtPassword->close();
$conn->close();


?>

</html>