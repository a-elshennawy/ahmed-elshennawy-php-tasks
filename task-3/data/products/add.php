<?php
include_once '../../env/database.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $addProd = "INSERT INTO `products` (name,price) VALUE ('$name',$price)";
    $addProdDone = mysqli_query($connect, $addProd);
    header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/products/list.php");
}

$update = false;
$name = null;
$number = null;
$address = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectOneProducts = "SELECT * FROM `products` WHERE id = $id";
    $selectOneProductItem = mysqli_query($connect, $selectOneProducts);

    $oneProduct = mysqli_fetch_assoc($selectOneProductItem);
    $name =  $oneProduct['name'];
    $price =  $oneProduct['price'];

    $update = true;
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $update = "UPDATE `products` SET name ='$name',price =$price WHERE id =$id";
        mysqli_query($connect, $update);
        header("location:http://localhost/ahmed-elshennawy-php-tasks/task-3/data/products/list.php");
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
                <h3>add product</h3>
            </div>
            <form method="post" class="dataForm col-12 row">
                <input type="text" name="name" value="<?= $name ?>" class="col-12" placeholder="enter product name" required>
                <input type="number" name="price" value="<?= $price ?>" class="col-12" placeholder="enter product price $" required>
                <?php if ($update): ?>
                    <button name="update" class="updateBtn col-2">
                        update product
                    </button>
                <?php else: ?>
                    <button name="send" class="addBtn col-2">
                        add product
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>



<!-- importing script -->
<?php include_once '../../shared/script.php' ?>