<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- libraries -->
  <link rel="stylesheet" href="css/Vendors/bootstrap.min.css">
  <link rel="stylesheet" href="css/Vendors/all.min.css">
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

        <div class="header col-10">
          <h2>crud php</h2>
        </div>

        <form action="" class="dataForm col-12 row">
          <input class="col-12" type="text" placeholder="enter customer name" required>

          <input class="col-12" type="email" placeholder="enter customer email" required>

          <select class="col-12" name="" id="" required>
            <option selected disabled>Select Gender</option>
            <option value="male">male</option>
            <option value="female">female</option>
          </select>

          <input class="col-12" type="number" placeholder="enter customer age" required>

          <button type="submit" class="submitBtn col-2">
            add customer
          </button>
        </form>
      </div>
    </div>
  </section>




  <!-- script -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>