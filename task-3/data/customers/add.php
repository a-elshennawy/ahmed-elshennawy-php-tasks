<?php
include_once '../../env/database.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $adCustomer = "INSERT INTO `customers` (name,phone,address) VALUES ('$name','$number','$address')";
    $additionDone = mysqli_query($connect, $adCustomer);
    header("location:http://localhost/instant-php/task-3/data/customers/list.php");
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
                <input type="text" name="name" value="" class="col-12" placeholder="enter customer name" required>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12" name="number" value="" class="col-12" placeholder="enter customer phone number" required>
                <input type="text" name="address" value="" class="col-12" placeholder="enter customer address" required>
                <button name="send" class="addBtn col-2">
                    add customer
                </button>
            </form>
        </div>
    </div>
</section>




<!-- importing script -->
<?php include_once '../../shared/script.php' ?>