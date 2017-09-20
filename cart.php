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
    <?php
    echo $mem_id;
    ?>
      <br /><br />
  </div>
</div>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
  <?php

  while($row1 = mysqli_fetch_array($result1)){
    echo '<p>Product: '. $row1['product_id'] . '</p>';
    echo '<p>Member1: '. $row1['mem_id'] . '</p>';
    echo '<p>ID: '. $row1['id'] . '</p>';
    echo '<p>Mem_id: '. $mem_id . '</p>';

    if($row1['mem_id'] == $mem_id){
        echo '<p>Hit1: '. $mem_id . '</p>';
        while($row2 = mysqli_fetch_array($result2)){
            echo '<p>Hit2: '. $mem_id . '</p>';
            if($row2['id'] == $row1['product_id']){
                echo '<p>Hit3: '. $mem_id . '</p>';
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
