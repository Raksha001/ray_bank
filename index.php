<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Basic Banking System</title>
</head>

<body>

  <?php
  require_once 'config.php';
  include 'navbar.php';
  ?>

  <div class="container card mt-5 rounded shadow-sm p-4" data-aos="fade-up">
    <div class="text-center">
      <h1 class="font-weight-bolder">RAY BANK</h1>
      <p class="font-weight-bold h4">Whether you need to transfer money to friends down the street or family across the globe,The Ray gets your funds there quickly and reliably.</p>
    </div>
    <div class="row mt-2">
      <div class="col-md-6"><a href="transfermoney.php" class="btn btn-dark btn-lg btn-block">View Customers to transfer</a></div>
      <div class="col-md-6"><a href="transactionhistory.php" class="btn btn-dark btn-lg btn-block">Transfer History</a></div>
    </div>
  </div>

  <footer class="text-center text-white fixed-bottom py-2">
    <p>Created by <strong> Raksha V G </strong> <br>@The Sparks Foundation</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>