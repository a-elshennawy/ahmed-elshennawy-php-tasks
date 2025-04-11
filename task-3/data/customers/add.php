<?php
include_once '../../env/database.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $addCustomer = "INSERT INTO `customers` (name,phone,address) VALUES ('$name','$number','$address')";
    $additionDone = mysqli_query($connect, $addCustomer);
    header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/list.php");
}

$update = false;
$name = null;
$number = null;
$address = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectOneCustomer = "SELECT * FROM `customers` WHERE id = $id";
    $selectOneCustomerItem = mysqli_query($connect, $selectOneCustomer);

    $oneCustomer = mysqli_fetch_assoc($selectOneCustomerItem);
    $name =  $oneCustomer['name'];
    $number =  $oneCustomer['phone'];
    $address =  $oneCustomer['address'];

    $update = true;
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $address = $_POST['address'];

        $update = "UPDATE `customers` SET name ='$name',phone ='$number', address ='$address' WHERE id =$id";
        mysqli_query($connect, $update);
        header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/list.php");
    }
}

?>
<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/nav.php' ?>


<section>
    <div class="container">
        <div class="inputPanel row">
            <div class="header col-10">
                <h3>add customer</h3>
            </div>
            <form method="post" class="dataForm col-12 row">
                <input type="text" name="name" value="<?= $name ?>" class="col-12" placeholder="enter customer name" required>
                <input type="tel" name="number" value="<?= $number ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12" class="col-12" placeholder="enter customer phone number" required>
                <input type="text" name="address" value="<?= $address ?>" class="col-12" placeholder="enter customer address" required>
                <?php if ($update): ?>
                    <button name="update" class="updateBtn col-2">
                        update customer
                    </button>
                <?php else: ?>
                    <button name="send" class="addBtn col-2">
                        add customer
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>




<!-- importing script -->
<?php include_once '../../shared/script.php' ?>