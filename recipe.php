<?php
require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager";

$result = mysqli_query($dbconnect, $query) or die('run query failed');

include 'head.php'; 

?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Recipes</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <form action="pub_detail.php" method="GET">
      <?php
        while($row = mysqli_fetch_array($result)){
          echo '<article class="clearfix panel panel-default">';
          echo '<div class="col-xs-4"><img src="'. $row['picture'] .'" alt="Recipe" /> </div>';
          echo  '<div class="col-xs-8"><h3>' . $row['recipeTitle'] . '</h3>';
          echo  '<p>'. $row['recipeType'] . '</p>';
          echo '<p>Prep Time: ' . $row['prepTime'] . ' Cook Time: ' . $row['cookTime'] .'</p>';
          echo '<a href="pub_detail.php?id='.$row['id'].'">View Details</a></div>';
          echo  '</article>';
        }
      ?>
    </form>
    <br /><br />
    <br /><br />
  </div>
</div>

<?php include 'footer.php'; ?>
