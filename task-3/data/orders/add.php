<?php
include_once '../../env/database.php';


$selectCustomers = " SELECT * FROM `customers` ";
$allCustomers = mysqli_query($connect, $selectCustomers);

$selectProducts = " SELECT * FROM `products` ";
$allProducts = mysqli_query($connect, $selectProducts);

if (isset($_POST['send'])) {
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $amount = $_POST['orderAmount'];

    $addOrder = "INSERT INTO `orders` (customerid ,productid ,amount) VALUES ($customer,$product,$amount)";
    $additionDone = mysqli_query($connect, $addOrder);
    header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/orders/list.php");
}
$update = false;
$customer = null;
$product = null;
$amount = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectOneOrder = "SELECT * FROM `orders` WHERE id =$id";
    $selectOneOrderItem = mysqli_query($connect, $selectOneOrder);

    $oneOrder = mysqli_fetch_assoc($selectOneOrderItem);
    $customer =  $oneOrder['customerid'];
    $product =  $oneOrder['productid'];
    $amount =  $oneOrder['amount'];

    $update = true;
    if (isset($_POST['update'])) {
        $customer = $_POST['customer'];
        $product = $_POST['product'];
        $amount = $_POST['orderAmount'];

        $update = "UPDATE `orders` SET customerid ='$customer', productid ='$product', amount = $amount WHERE id =$id";
        mysqli_query($connect, $update);
        header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/orders/list.php");
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
                <h3>add order</h3>
            </div>
            <form method="post" class="dataForm col-12 row">
                <select name="customer" id="" required>
                    <option value="" disabled selected>select customer</option>
                    <?php foreach ($allCustomers as $item): ?>
                        <?php if ($item['id'] == $customer): ?>
                            <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php else: ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="product" id="" required>
                    <option value="" disabled selected>select product</option>
                    <?php foreach ($allProducts as $item): ?>
                        <?php if ($item['id'] == $product): ?>
                            <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php else: ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="orderAmount" placeholder="order amount $" value="<?= $amount ?>" required>
                <?php if ($update): ?>
                    <button name="update" class="updateBtn col-2">
                        update order
                    </button>
                <?php else: ?>
                    <button name="send" class="addBtn col-2">
                        add order
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>



<!-- importing script -->
<?php include_once '../../shared/script.php' ?>