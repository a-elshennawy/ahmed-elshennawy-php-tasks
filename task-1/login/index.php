<?php
$userName = "shennawy";
$passWord = "shenno997";

$credMatch = null;

if (isset($_POST['logBtn'])) {
    if ($_POST['userName'] == $userName && $_POST['passWord'] == $passWord) {
        $credMatch = true;
    } else {
        $credMatch = false;
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
    <title>Log In</title>
</head>

<body>
    <div class="container">
        <h1>Log In Form</h1>
        <form method="POST" action="" class="loginForm row">
            <div class="inputgroup col-10">
                <input type="text" name="userName" placeholder="Enter your username" required>
            </div>
            <div class="inputgroup col-10">
                <input type="password" name="passWord" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="logBtn" class="logBtn col-3">
                Log In
            </button>
        </form>
    </div>

    <?php if ($credMatch === true): ?>
        <h2>Welcome back, <?= $userName ?></h2>
    <?php elseif ($credMatch === false): ?>
        <h2>Wrong username / password, try again.</h2>
    <?php else: ?>
    <?php endif; ?>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>