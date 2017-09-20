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
<br /><br />
<div class="row">
	<div class="col-sm-1 text-center"></div>
  <div class="col-sm-10 text-center">
	<article class="clearfix panel panel-default">
  	<h1>Your Cart</h1>
	</article>
  </div>
</div>
<form action="checkout.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
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
          echo '<a style="color:red;" href=deleteCartItem.php?id='.$row1['id'].'> Remove</a>';
          echo '<input type="hidden" name="product_id'.$row2['id'].'" value="'.$row2['id'].'">';
          echo '<input type="hidden" name="Item:'.$row2['title'].'" value="'.$row2['price'].'">';
          echo  '</article>';
      };
    };
  };
};
  ?>
  </div>
</div>
<br /><br />
<div class="row">
	<div class="col-sm-1 text-center"></div>
  <div class="col-sm-10 text-center">
    <br /><br />
      <a href="products.php" class="padding-sm" style="margin-right: 50px;"><button class="btn btn-success btn-lg">Shop Some More</button></a>
      <input type="submit"  class="btn btn-lg btn-success" name="submit" value="Proceed to Checkout" id="submit"/>
      <br /><br /><br /><br />
  </div>
</div>
</form>

<?php include 'footer.php'; ?>
