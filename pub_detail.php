<?php
require_once('variable.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM products WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die ('display query run failed');

$found = mysqli_fetch_array($result);

include 'head.php';

?>

<div class="row">
  <div class="col-xs-12 text-center">
    <br /><br />
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <?php
      echo '<article class="clearfix panel panel-default">';
      echo '<div class="col-xs-4"><img src="'. $found['picture'] .'" alt="Products" /> </div>';
      echo '<div class="col-xs-8"><h3>' . $found['title'] . '</h3>';
      echo '<p>Price: $' . $found['price'] .'</p>';
      echo '<p>' . $found['longdescription'] . '</p>';
      echo '<br /><a href="cart.php?id='.$found['id'].'"><button class="btn btn-success">Add to Cart</button></a></div>';
      echo '</article>';
      
    ?>

  </div>
</div>

<?php include 'footer.php'; ?>
