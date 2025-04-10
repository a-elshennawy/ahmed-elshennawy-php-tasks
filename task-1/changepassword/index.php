<?php
$currPassword = "@#ShMr997!";
$matchCurrentpass = true;
$matchnewpass = true;
$passchanged = false;
$revealPass = false;

if (isset($_POST['changeBtn'])) {
    if ($_POST['currPassword'] == $currPassword) {
        if ($_POST['newPassword'] == $_POST['confirmNewpassword']) {
            $passchanged = true;
            $currPassword = $_POST['newPassword'];
            $revealPass = true;
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
    <link rel="stylesheet" href="passwordchange.css">
    <title>Change Password</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="" class="changepasswordFrom row">
            <h1>Change Password</h1>
            <div class="inputgroup col-12">
                <input type="password" name="currPassword" placeholder="Enter your current password" required>
            </div>
            <div class="inputgroup col-12">
                <input type="password" name="newPassword" placeholder="Choose new password" required>
            </div>
            <div class="inputgroup col-12">
                <input type="password" name="confirmNewpassword" placeholder="Confirm your new password" required>
            </div>
            <button type="submit" name="changeBtn" class="changeBtn col-2">
                Confirm
            </button>

            <?php if ($matchCurrentpass == false) : ?>
                <p class="incorrectCRP">Incorrect current password</p>
            <?php endif; ?>

            <?php if ($matchnewpass == false): ?>
                <p class="pMismatch">Password mismatch</p>
            <?php endif; ?>

            <?php if ($passchanged): ?>
                <p class="doneMSG">Password changed successfully</p>
            <?php endif; ?>

            <?php if ($revealPass): ?>
                <p class="currpass">Current password: <?= htmlspecialchars($currPassword) ?> </p>
            <?php endif; ?>

        </form>

    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>