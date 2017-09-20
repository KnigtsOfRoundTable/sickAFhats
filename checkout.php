<?php
require_once('variable.php');

$mem_id = $_COOKIE['id'];
$productArray = array();
$titleArray = array();
$priceArray = array();
$shippingArray = array();
$taxArray = array();
$amountArray = array();
$timesPrice = array();

foreach($_POST as $k => $v) {
  if(strpos($k, 'title') === 0) {
      array_push($titleArray, $v);
  }
}
foreach($_POST as $k => $v) {
  if(strpos($k, 'price') === 0) {
      array_push($priceArray, $v);
  }
}
foreach($_POST as $k => $v) {
  if(strpos($k, 'shipping') === 0) {
      array_push($shippingArray, $v);
  }
}
foreach($_POST as $k => $v) {
  if(strpos($k, 'tax') === 0) {
      array_push($taxArray, $v);
  }
}
foreach($_POST as $k => $v) {
  if(strpos($k, 'amount') === 0) {
      array_push($amountArray, $v);
  }
}

for($i = 0; $i < count($titleArray); ++$i) {
  $inputtitle = $titleArray[$i];
  $inputamount = $amountArray[$i];
  array_push($productArray, $inputamount);
  array_push($productArray, $inputtitle);
}

for($i = 0; $i < count($priceArray); ++$i) {
  $inputprice = $priceArray[$i];
  $inputamount = $amountArray[$i];
  $newPrice = $inputamount * $inputprice;
  array_push($timesPrice, $newPrice);

}

$stringProducts = implode(",", $productArray);

$priceTotal = array_sum($timesPrice);
$shippingTotal = array_sum($shippingArray);
$taxTotal = array_sum($taxArray);

$subTotal =  $priceTotal + $shippingTotal + $taxTotal;


$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM member";
$resultMember = mysqli_query($dbconnect, $query) or die('Member query failed');


$query2 = "SELECT * FROM cart";
$resultCart = mysqli_query($dbconnect, $query2) or die('Cart query failed');
$foundCart = mysqli_fetch_array($resultCart);

$query3 = "SELECT * FROM products";
$resultProduct = mysqli_query($dbconnect, $query3) or die('Product query failed');
$foundProduct = mysqli_fetch_array($resultProduct);


include 'head.php';
 ?>
<form action="saveToDB.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
<br /><br />
<div class="row">
<div class="col-xs-1"></div>
<div class="col-xs-6">
  <article class="clearfix panel panel-default">
    
    <?php
    while($row1 = mysqli_fetch_array($resultMember)){
      if($row1['id'] == $mem_id){
      echo '<h1 class="text-center">Your Information</h1><div class="form-group">
      <span>Name <input type="text" name="name" value="'.$row1['name'] .'" class="form-control"></span>
      </div>
      <div class="form-group">
      <span>Email <input type="text" name="email" value="'.$row1['email'] .'" class="form-control"></span>
      </div>

      <div class="form-group">
      <span>Phone <input type="tel" name="phone" value="'.$row1['phone'] .'" class="form-control"></span>
      </div>

      <div class="form-group">
      <span>Address <input type="text" name="address" value="'.$row1['address'] .'" class="form-control"></span>
      </div>

      <div class="form-group">
      <span>Credit Card Number<input type="number" name="creditcard" value="'.$row1['creditcard'] .'" class="form-control"></span>
      </div>

      <input type="hidden" name="subTotal" value="'.$subTotal .'">
      <input type="hidden" name="productArray" value="'.$stringProducts .'">';

      echo'<h1 class="text-center">Subtotal: $' . $subTotal . '</h1>';

    }
  }
      ?>
      <br /><br />

      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg submit-btn" name="submit">Place Order</button>
      </div>
  
      <br /><br />
  
  </article>
  </div>
  <div class="col-xs-4">
    <article class="clearfix panel panel-default">
      <h1 class="text-center">Billing Break Down</h1>
      <div class="row">
      
      <div class="col-xs-7">
      <?php 
      for($i = 0; $i < count($titleArray); ++$i) {
        echo $titleArray[$i]. ': ';
        echo '$'.$priceArray[$i];
        echo ' x'.$amountArray[$i]. '<br />';
      }

      ?>
      </div>
      </div>
      <br /><br />
      <?php
      echo "Total Item Price: $" . $priceTotal . "<br />";
      echo "Total Shipping Price: $" . $shippingTotal . "<br />";
      echo "Total Tax Price: $" . $taxTotal . "<br /><br />";
      echo "Subtotal: $" . $subTotal  . "<br />";
      
      ?>
    </article>
  </div>
  <div class="col-xs-1"></div>
  </div>
</div>
</form>
  
  <?php include 'footer.php'; ?>
