<?php
require_once('variable.php');

$mem_id = $_COOKIE['id'];
$priceArray = array();
$shippingArray = array();
$taxArray = array();

foreach($_POST as $k => $v) {
  if(strpos($k, 'product_id') === 0) {
      echo "$k = $v";
      echo '<p>ID: '. $v . '</p>';

  }
}
foreach($_POST as $k => $v) {
  if(strpos($k, 'price') === 0) {
      array_push($priceArray, $v);
  }
}
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

<br /><br />
<div class="row">
<div class="col-xs-1"></div>
<div class="col-xs-6">
  <article class="clearfix panel panel-default">
    <form action="saveToDB.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
    <?php
    while($row1 = mysqli_fetch_array($resultMember)){
      if($row1['id'] == $mem_id){
      echo '<div class="form-group">
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
      <span>Credit Card <input type="number" name="creditcard" value="'.$row1['creditcard'] .'" class="form-control"></span>
      </div>

      <input type="hidden" name="mem_id" value="'.$row1['id'] .'">';

    }
  }
      ?>
      <br /><br />

      <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg submit-btn" name="submit">Place Order</button>
      </div>
  
      <br /><br />
  </form>
  </article>
  </div>
  <div class="col-xs-4">
    <article class="clearfix panel panel-default">
      
    </article>
  </div>
  <div class="col-xs-1"></div>
  </div>
</div>
  
  <?php include 'footer.php'; ?>
