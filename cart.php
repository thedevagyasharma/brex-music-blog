<?php
require_once "pdo.php";
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Cart</title>
</head>
<body>
  <?php include"navbar.php" ?>
  <div class="container-fluid" style="margin-top:50px">
    <div class="row">
      <!-- <Cart> -->
      <div class="col-6">
        <div class="card">
          <div class="card-header"><h3>Cart</h3></div>
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                  <img src="https://merchbar.imgix.net/product/194/7952/4525284720736/UsJWCQwhCrossbody-rhcp.jpg?w=640&h=640&quality=60&auto=compress%252Cformat" width="200px">
              </div>
              <div class="col-3">
                <h4>Item Name</h4>
                <h5>Price</h5>
                <h6>Size | Quantity</h6>
              </div>
            </div>
              <hr>
            <div class="row">
              <div class="col-3">
                  <img src="https://merchbar.imgix.net/product/194/7952/4525284720736/UsJWCQwhCrossbody-rhcp.jpg?w=640&h=640&quality=60&auto=compress%252Cformat" width="200px">
              </div>
              <div class="col-3">
                <h4>Item Name</h4>
                <h5>Price</h5>
                <h6>Size | Quantity</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--</cart>-->
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3>Payment</h3>
          </div>
          <div class="card-body">
            <h4>Amount :</h4>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>
