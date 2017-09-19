<?php
require_once('auth.php');
require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager";

$result = mysqli_query($dbconnect, $query) or die('run query failed');

include 'head.php';

?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Manage Products</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10 text-center">
      <form action="pub_detail.php" method="get">
      <?php
        while($row = mysqli_fetch_array($result)){
          echo '<article class="margin-sm padding-sm clearfix panel panel-default">';
          echo '<figure id="manageImg"><img src="'. $row['picture'] .'" alt="Recipe" /> </figure>';
          echo  '<h3>' . $row['recipeTitle'] . '</h3>';
          echo  '<p>'. $row['recipeType'] . '</p>';
          echo '<p>Prep Time: ' . $row['prepTime'] . ' Cook Time: ' . $row['cookTime'] .'</p>';
          echo '<a href="purchaseHistory.php">Purchase History - </a><a href="admin_detail.php?id='.$row['id'].'">Detail view - </a> <a href="update.php?id='.$row['id'].'">Update</a> <a href=delete.php?id='.$row['id'].'> - Delete</a>';
          echo  '</article>';
      }
      ?>
      </form>
      <br /><br />
      <a href="add.php" class="padding-sm"><button class="btn btn-success btn-lg">Add a new Recipe</button></a>
      <br /><br />
  </div>
</div>

<?php include 'footer.php'; ?>
