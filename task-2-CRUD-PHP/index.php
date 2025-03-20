<?php
$count = 1;
// connecting our database
$host = "localhost";
$user = "root";
$password = "";
$databaseName = "shop";

try {
  $connect = mysqli_connect($host, $user, $password, $databaseName);
} catch (Exception $e) {
  echo $e->getMessage();
}

// select categories that already exist in our database
$selectCategories = " SELECT * FROM categories ";
$allCategories = mysqli_query($connect, $selectCategories);

// create products
$message = null;
if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];

  $insertproduct = "INSERT INTO products (name, price, categoryid) VALUES ('$name', $price, $category)";
  $done = mysqli_query($connect, $insertproduct);
  if ($done) {
    $message = "a new producted is added successfully";
  } else {
    $message = null;
  }
}

// read products 
$selectProds = "SELECT * FROM `product_with_categories` ORDER BY id DESC";
$allProds = mysqli_query($connect, $selectProds);

// reading one item by id (view)
if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneProd = "SELECT * FROM `product_with_categories` WHERE id = $id ";
  $selectOneProdItem = mysqli_query($connect, $selectOneProd);

  // instead of for each
  $oneProd = mysqli_fetch_assoc($selectOneProdItem);
}

// delete 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM products WHERE id = $id";
  mysqli_query($connect, $delete);

  // to refresh the data assuring all is up to data (yet it's better to recall the main query)
  // header("location: http://localhost/instant-php/task-2-CRUD-PHP/");

  // repeating the query to refresh data
  $allProds = mysqli_query($connect, $selectProds);
}

// edit (actually viewing one item inside the input again)
// flag vars
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
}

// update


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- libraries -->
  <link rel="stylesheet" href="css/Vendors/bootstrap.min.css">
  <!-- customized stylesheet -->
  <link rel="stylesheet" href="css/main.css">
  <!-- title -->
  <title>CRUD PHP</title>
</head>

<body>
  <!-- inputs panel -->
  <section>
    <div class="container">
      <div class="inptPanel row">
        <!-- header -->
        <div class="header col-10">
          <h2>crud php</h2>
        </div>
        <!-- alert message to indicate successfull insertion -->
        <?php if ($message != null): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <!-- inputs -->
        <form method="post" class="dataForm col-12 row">

          <input name="name" value="<?= $name ?>" class="col-12" type="text" placeholder="enter product name" required>

          <input name="price" value="<?= $price ?>" class="col-12" type="number" placeholder="enter product price" required>

          <select name="category" class="col-12" id="" required>

            <option disabled>Select category</option>
            <?php foreach ($allCategories as $item): ?>
              <?php if ($item['id'] == $categoryid): ?>
                <option selected value="<?= $item['id'] ?>"></option>
              <?php else: ?>
                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>

          <button name="send" type="submit" class="submitBtn col-2">
            add customer
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- customers list -->
  <section>
    <div class="container-fluid">
      <table class="customersList">
        <thead>
          <td>ID</td>
          <td>name</td>
          <td>action</td>
        </thead>

        <?php foreach ($allProds as $item): ?>
          <tbody>
            <tr>
              <td><?= $count++ ?></td>
              <td><?= $item['ProductName'] ?></td>
              <td>
                <!-- view -->
                <a href="http://localhost/instant-php/task-2-CRUD-PHP/?view= <?= $item['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00a0fd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                    <circle cx="12" cy="12" r="3" />
                  </svg>
                </a>
                <!-- edit -->
                <a href="http://localhost/instant-php/task-2-CRUD-PHP/?edit= <?= $item['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fdd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen">
                    <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                    <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    <circle cx="10" cy="7" r="4" />
                  </svg>
                </a>
                <!-- delete -->
                <a href="http://localhost/instant-php/task-2-CRUD-PHP/?delete= <?= $item['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fd0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                    <path d="M3 6h18" />
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                    <line x1="10" x2="10" y1="11" y2="17" />
                    <line x1="14" x2="14" y1="11" y2="17" />
                  </svg>
                </a>
              </td>
          </tbody>
        <?php endforeach; ?>

      </table>
    </div>
  </section>

  <!-- product modal -->
  <?php if (isset($_GET['view'])): ?>
    <div class="prodModal">
      <div class="modalcontent">
        <h4>product details
          <a class="float-end" href="http://localhost/instant-php/task-2-CRUD-PHP/">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </a>
        </h4>
        <h6>
          <strong>name :</strong> <?= $oneProd['ProductName'] ?>
          <hr>
          <strong>price : $</strong> <?= $oneProd['price'] ?>
          <hr>
          <strong>category :</strong> <?= $oneProd['categoryName'] ?>
          <hr>
          <strong>description :</strong> <?= $oneProd['description'] ?>
        </h6>
      </div>
    </div>
  <?php endif; ?>
  <!-- script -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>