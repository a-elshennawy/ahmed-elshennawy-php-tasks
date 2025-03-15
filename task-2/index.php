<?php

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
$selectProds = "SELECT * FROM products";
$allProds = mysqli_query($connect, $selectProds);


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
          <input name="name" class="col-12" type="text" placeholder="enter product name" required>

          <input name="price" class="col-12" type="number" placeholder="enter product price" required>

          <select name="category" class="col-12" id="" required>
            <option selected disabled>Select category</option>
            <?php foreach ($allCategories as $item): ?>
              <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
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
          <td>price</td>
          <td>category</td>
        </thead>

        <?php foreach ($allProds as $item): ?>
          <tbody>
            <tr>
              <td><?= $item['id'] ?></td>
              <td><?= $item['name'] ?></td>
              <td><?= $item['price'] ?></td>
              <td><?= $item['categoryid'] ?></td>

              <!-- <td>
                <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                    <circle cx="12" cy="12" r="3" />
                  </svg>
                </a>
                <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen">
                    <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                    <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    <circle cx="10" cy="7" r="4" />
                  </svg>
                </a>
                <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                    <path d="M3 6h18" />
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                    <line x1="10" x2="10" y1="11" y2="17" />
                    <line x1="14" x2="14" y1="11" y2="17" />
                  </svg>
                </a>
              </td> -->
          </tbody>
        <?php endforeach; ?>

      </table>
    </div>
  </section>


  <!-- script -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>