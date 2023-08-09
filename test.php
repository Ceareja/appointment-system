<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/appointment-system/bootstrap-5.3.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/appointment-system/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <!--  myCSS -->
    <link rel="stylesheet" href="/appointment-system/CSS/app.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="/appointment-system/script.js"></script>
    <title>test</title>
</head>

<body>
    <form method="POST" action="">
        <input class="form-control" name="email" type="email" placeholder="Email Address" require>
        <br>
        <input class="form-control" name="password" type="password" placeholder="Password" require>
        <br>
        <button type="submit" name="submitEmailAndPassword" href="#" class="loginButton btn btn-primary">Login</button>
        <button class="backButton btn btn-secondary">Back</button>
    </form>
    <form method="POST" action="">
        <input type="submit" name="clicked" placeholder="click here!">
    </form>
</body>

<?php
if (isset($_POST['clicked'])) {
    echo "button was clicked!";
}
if (isset($_POST['submitEmailAndPassword'])) {
    echo '<script>alert("Form submitted!");</script>';
}
?>

</html>