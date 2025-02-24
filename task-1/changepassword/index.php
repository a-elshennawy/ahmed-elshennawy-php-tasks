<?php

$currPassword = "@#ShMr997!";

$matchCurrentpass = true;
$matchnewpass = true;
$passchanged = false;

if (isset($_POST['changeBtn'])) {
    if ($_POST['currPassword'] == $currPassword) {
        if ($_POST['newPassword'] == $_POST['confirmNewpassword']) {
            $passchanged = true;
            $currPassword = $_POST['newPassword'];
        } else {
            $matchnewpass = false;
        }
    } else {
        $matchCurrentpass = false;
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
    <title>change password</title>
</head>

<body>
    <div class="container">
        <h1>change password</h1>
        <form method="POST" action="" class="changepasswordFrom row">
            <div class="inputgroup col-10">
                <input type="password" name="currPassword" placeholder="enter your curent password" required>
            </div>
            <div class="inputgroup col-10">
                <input type="password" name="newPassword" placeholder="choose new password" required>
            </div>
            <div class="inputgroup col-10">
                <input type="password" name="confirmNewpassword" placeholder="confirm your new password" required>
            </div>
            <button type="submit" name="changeBtn" class="changeBtn col-3">
                confirm
            </button>
        </form>
    </div>

    <?php if ($matchCurrentpass == false) : ?>
        <h1>inncorrect current password</h1>
    <?php endif; ?>

    <?php if ($matchnewpass == false): ?>
        <h1>password mismatch</h1>
    <?php endif; ?>

    <?php if ($passchanged): ?>
        <h1>password changed successfully</h1>
    <?php endif; ?>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>