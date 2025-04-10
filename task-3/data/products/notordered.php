<?php
$count = 1;
include_once '../../env/database.php';

$selectNotOrderedProds = "SELECT * FROM `products_no_orders` ORDER BY product_id DESC";
$allNotOrderedProds = mysqli_query($connect, $selectNotOrderedProds);

if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneProd = "SELECT * FROM `products_no_orders` WHERE product_id = $id";
    $selectOneProdItem = mysqli_query($connect, $selectOneProd);

    $oneProduct = mysqli_fetch_assoc($selectOneProdItem);
}

?>
<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/nav.php' ?>
<!-- products list -->

<section>
    <div class="container">
        <h3 class="listHeader">not ordered products</h3>
        <table class="list">
            <thead>
                <td>id</td>
                <td>product name</td>
                <td>action</td>
            </thead>
            <?php foreach ($allNotOrderedProds as $item): ?>
                <tbody>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td>
                            <!-- view -->
                            <a href="http://localhost/instant-php/task-3/data/products/notordered.php?view= <?= $item['product_id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00a0fd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<!-- product modal -->
<?php if (isset($_GET['view'])): ?>
    <div class="Modal">
        <div class="modalcontent">
            <h4>product details
                <a class="float-end" href="http://localhost/instant-php/task-3/data/products/notordered.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </a>
            </h4>
            <h6>
                <strong>name :</strong> <?= $oneProduct['product_name']  ?>
                <hr>
                <strong>price : $ </strong> <?= $oneProduct['product_price'] ?>
            </h6>
        </div>
    </div>
<?php endif; ?>


<!-- importing script -->
<?php include_once '../../shared/script.php' ?>