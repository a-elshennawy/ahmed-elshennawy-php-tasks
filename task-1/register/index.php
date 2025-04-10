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
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="" class="regForm row">
            <h1>Sign up Form</h1>
            <div class="inputgroup col-12">
                <input type="text" name="userName" placeholder="Enter your username" required>
            </div>
            <div class="inputgroup col-12">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="inputgroup col-12">
                <input type="password" name="passWord" placeholder="choose your password" required>
            </div>
            <button type="submit" name="regBtn" class="regBtn col-2">
                sign up
            </button>

            <?php if ($regSuccessful): ?>
                <p>registration successful</p>
                <p>
                    Welcome to the website, <?= $userName ?>
                </p>
            <?php endif; ?>
        </form>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>