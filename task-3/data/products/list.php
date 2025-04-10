<?php
$count = 1;
include_once '../../env/database.php';

$selectProd = "SELECT * FROM `products` ORDER BY id DESC";
$allProd = mysqli_query($connect, $selectProd);


if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneProduct = "SELECT * FROM `products` WHERE id = $id";
    $selectOneProductsItem = mysqli_query($connect, $selectOneProduct);

    $oneProduct = mysqli_fetch_assoc($selectOneProductsItem);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteProduct = "DELETE FROM `products` WHERE id = $id";
    mysqli_query($connect, $deleteProduct);

    $allCustomers = mysqli_query($connect, $selectProd);
    header("location:http://localhost/instant-php/task-3/data/products/list.php/list.php");
}

?>
<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/nav.php' ?>

<!-- products list -->
<section>
    <div class="container">
        <h3 class="listHeader">all products</h3>
        <table class="list">
            <thead>
                <td>id</td>
                <td>product name</td>
                <td>action</td>
            </thead>
            <?php foreach ($allProd as $item): ?>
                <tbody>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td>
                            <!-- view -->
                            <a href="http://localhost/instant-php/task-3/data/products/list.php?view=<?= $item['id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00a0fd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </a>
                            <!-- edit -->
                            <a href="http://localhost/instant-php/task-3/data/products/add.php?edit=<?= $item['id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fdd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen">
                                    <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                                    <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                    <circle cx="10" cy="7" r="4" />
                                </svg>
                            </a>
                            <!-- delete -->
                            <a href="http://localhost/instant-php/task-3/data/products/list.php?delete=<?= $item['id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fd0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                    <line x1="10" x2="10" y1="11" y2="17" />
                                    <line x1="14" x2="14" y1="11" y2="17" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</section>
<!-- products modal -->
<?php if (isset($_GET['view'])): ?>
    <div class="Modal">
        <div class="modalcontent">
            <h4>product details
                <a class="float-end" href="http://localhost/instant-php/task-3/data/products/list.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </a>
            </h4>
            <h6>
                <strong>product name :</strong> <?= $oneProduct['name']  ?>
                <hr>
                <strong>price : </strong> $ <?= $oneProduct['price'] ?>

            </h6>
        </div>
    </div>
<?php endif; ?>


<!-- importing script -->
<?php include_once '../../shared/script.php' ?>