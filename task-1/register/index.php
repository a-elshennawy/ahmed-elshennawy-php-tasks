<?php

$regSuccessful = false;

if (isset($_POST['regBtn'])) {
    if ($_POST['userName'] && $_POST['email'] && $_POST['passWord']) {

        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $passWord = $_POST['passWord'];

        $regSuccessful = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h1>Sign up Form</h1>
        <form method="POST" action="" class="regForm row">
            <div class="inputgroup col-10">
                <input type="text" name="userName" placeholder="Enter your username" required>
            </div>
            <div class="inputgroup col-10">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="inputgroup col-10">
                <input type="password" name="passWord" placeholder="choose your password" required>
            </div>
            <button type="submit" name="regBtn" class="regBtn col-3">
                sign up
            </button>
        </form>
    </div>

    <?php if ($regSuccessful): ?>
        <h2>registration successful</h2>
        <h2>
            Welcome to the website, <?= $userName ?>
        </h2>
    <?php endif; ?>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>