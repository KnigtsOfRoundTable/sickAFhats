<?php
require_once('variable.php');

$product_id = $_GET['id'];
$mem_id = $_COOKIE['id'];

if(isset($_POST['submit'])){
    $product_id = $_POST[newProductID];
  
    $dbconnect2 = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
  
    $query2 = " INSERT INTO cart (product_id, mem_id) VALUES ('$product_id', '$mem_id')";
  
    $result2 = mysqli_query($dbconnect2, $query2) or die('run query failed');
    
    mysqli_close($dbconnect2);
    
    header('Location: cart.php');
  
  }else{
    $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
    
    $query = "SELECT * FROM products WHERE id=$product_id";
    
    $result = mysqli_query($dbconnect, $query) or die ('display query run failed');
    
    $found = mysqli_fetch_array($result);

  }

include 'head.php';

?>

<div class="row">
  <div class="col-xs-12 text-center">
     <br />
    <br />
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <?php
      echo '<article class="clearfix panel panel-default">';
      echo '<form action="pub_detail.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">';
      echo '<div class="col-xs-4"><img src="'. $found['picture'] .'" alt="Products" /> </div>';
      echo '<div class="col-xs-8"><h3>' . $found['title'] . '</h3>';
      echo '<div class="priceTag">$' . $found['price'] .'</div><button type="submit" class="addCartBtn" name="submit">Add to Cart</button>';
      echo '<p>' . $found['longdescription'] . '</p>';
      echo '<input type="hidden" value="'. $product_id . '" name="newProductID">';
      echo '</form></article>';
    ?>

  </div>
</div>

<?php include 'footer.php'; ?>
