<?php
$mem_id = $_COOKIE['id'];

require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query1 = "SELECT * FROM cart";
$result1 = mysqli_query($dbconnect, $query1) or die('cart query failed');

$query2 = "SELECT * FROM products";
$result2 = mysqli_query($dbconnect, $query2) or die('product query failed');

include 'head.php';
 ?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Your Cart</h1>
      <br /><br />
  </div>
</div>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
  <?php

while($row1 = mysqli_fetch_array($result1)){
  if($row1['mem_id'] == $mem_id){
    $result2 = mysqli_query($dbconnect, $query2) or die('product query failed');
    while($row2 = mysqli_fetch_array($result2)){
      if($row2['id'] == $row1['product_id']){
          echo '<article class="clearfix panel panel-default">';
          echo '<div class="col-xs-4"><img src="'. $row2['picture'] .'" alt="Products" /> </div>';
          echo  '<div class="col-xs-8"><h3>' . $row2['title'] . '</h3>';
          echo '<p>Price: $' . $row2['price'] . '</p>';
          echo  '<p>'. $row2['shortdescription'] . '</p>';
          echo  '</article>';
      };
    };
  };
};
  ?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 text-center">
      <br /><br />
      <a href="checkout.php" class="padding-sm"><button class="btn btn-success btn-lg">Proceed to Checkout</button></a>
      <br /><br /><br /><br />
    </div>
</div>

<?php include 'footer.php'; ?>
