<?php
// importing database conncetion
include_once '../../env/database.php';

// select categories that already exist in our database
$selectCategories = " SELECT * FROM categories ";
$allCategories = mysqli_query($connect, $selectCategories);

// create products
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $insertproduct = "INSERT INTO products (name, price, categoryid) VALUES ('$name', $price, $category)";
    $done = mysqli_query($connect, $insertproduct);
    header("location:/instant-php/task-2-CRUD-PHP/data/products/list.php");
}

// edit (actually viewing one item inside the input again)
// flag vars
$update = false;
$name = null;
$price = null;
$category = null;


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];


    $selectOneProd = "SELECT * FROM `products` WHERE id = $id ";
    $selectOneProdItem = mysqli_query($connect, $selectOneProd);

    // instead of for each
    $oneProd = mysqli_fetch_assoc($selectOneProdItem);
    $name = $oneProd['name'];
    $price = $oneProd['price'];
    $category = $oneProd['categoryid'];

    $update = true;

    // update (it's inside the edit cuz why would u update if you ain't already editing !!! duuh )
    // flag var
    if (isset($_POST['update'])) {
        // same vars cuz it's same input
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $update = "UPDATE products SET name ='$name', price = $price, categoryid = $category WHERE id = $id ";
        mysqli_query($connect, $update);
        header("location: http://localhost/instant-php/task-2-CRUD-PHP/data/products/list.php");
    }
}

?>

<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/nav.php' ?>

<!-- inputs panel -->
<section>
    <div class="container">
        <div class="inptPanel row">
            <!-- header -->
            <div class="header col-10">
                <h2>crud php</h2>
            </div>

            <!-- inputs -->
            <form method="post" class="dataForm col-12 row">
                <!-- name -->
                <input name="name" value="<?= $name ?>" class="col-12" type="text" placeholder="enter product name" required>
                <!-- price -->
                <input name="price" value="<?= $price ?>" class="col-12" type="number" placeholder="enter product price" required>
                <!-- category -->
                <select name="category" class="col-12" required>
                    <option selected disabled>Select category</option>
                    <?php foreach ($allCategories as $item): ?>
                        <?php if ($item['id'] == $category): ?>
                            <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php else: ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <!-- decide which btn to show based on edit or add -->
                <!-- update btn -->
                <?php if ($update): ?>
                    <button name="update" class="updateBtn col-2">
                        update
                    </button>
                    <!-- add btn -->
                <?php else: ?>
                    <button name="send" class="submitBtn col-2">
                        add
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<!-- importing script -->
<?php include_once '../../shared/script.php' ?>