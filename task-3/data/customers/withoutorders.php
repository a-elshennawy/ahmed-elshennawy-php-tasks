<?php
$count = 1;
include_once '../../env/database.php';

$selectCustomersNOOREDERS = "SELECT * FROM `customer_no_orders` ORDER BY customer_id DESC";
$allNoORdersCustomers = mysqli_query($connect, $selectCustomersNOOREDERS);

if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneCustomer = "SELECT * FROM `customer_no_orders` WHERE customer_id = $id";
    $selectOneCustomerItem = mysqli_query($connect, $selectOneCustomer);

    $oneCustomer = mysqli_fetch_assoc($selectOneCustomerItem);
}



?>
<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/nav.php' ?>
<!-- products list -->

<!-- customers list -->
<section>
    <div class="container">
        <h3 class="listHeader">customers without orders</h3>
        <table class="list">
            <thead>
                <td>id</td>
                <td>name</td>
                <td>action</td>
            </thead>
            <?php foreach ($allNoORdersCustomers as $customers): ?>
                <tbody>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $customers['customer_name'] ?></td>
                        <td>
                            <!-- view -->
                            <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/withoutorders.php?view= <?= $customers['customer_id'] ?>">
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
<!-- customer modal -->
<?php if (isset($_GET['view'])): ?>
    <div class="Modal">
        <div class="modalcontent">
            <h4>customer details
                <a class="float-end" href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/withoutorders.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </a>
            </h4>
            <h6>
                <strong>name :</strong> <?= $oneCustomer['customer_name']  ?>
                <hr>
                <strong>phone : </strong> <?= $oneCustomer['customer_phone'] ?>
                <hr>
                <strong>street address : </strong> <?= $oneCustomer['customer_address'] ?>
            </h6>
        </div>
    </div>
<?php endif; ?>


<!-- importing script -->
<?php include_once '../../shared/script.php' ?>