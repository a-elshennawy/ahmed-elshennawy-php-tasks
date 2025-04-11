<?php
include_once './env/database.php';


$database_status = "SELECT * FROM `database_status`";
$counters = mysqli_query($connect, $database_status);

$allCounters = mysqli_fetch_assoc($counters);
?>

<!-- importing head -->
<?php include_once './shared/head.php' ?>

<!-- importing navbar -->
<?php include_once './shared/nav.php' ?>

<section>
  <div class="container">
    <h2 class="homeHeader">current status</h2>
    <div class="status row">
      <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/list.php" class="count col-3">
        <h5 class="countTitle">total customers</h5>
        <h1 class="countValue"><?= $allCounters['total_customers'] ?></h1>
      </a>
      <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/products/list.php" class="count col-3">
        <h5 class="countTitle">total products</h5>
        <h1 class="countValue"><?= $allCounters['total_products'] ?></h1>
      </a>
      <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/orders/list.php" class="count col-3">
        <h5 class="countTitle">total orders</h5>
        <h1 class="countValue"><?= $allCounters['total_orders'] ?></h1>
      </a>
      <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/customers/withoutorders.php" class="count col-3">
        <h5 class="countTitle">customers with no orders</h5>
        <h1 class="countValue"><?= $allCounters['customers_without_orders'] ?></h1>
      </a>
      <a href="http://localhost/ahmed-elshennawy-php-tasks/task-3/data/products/notordered.php" class="count col-3">
        <h5 class="countTitle">not ordered products</h5>
        <h1 class="countValue"><?= $allCounters['products_not_ordered'] ?></h1>
      </a>
    </div>
  </div>
</section>

<!-- importing script -->
<?php include_once './shared/script.php' ?>