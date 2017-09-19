<?php
require_once('variable.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die ('display query run failed');

$found = mysqli_fetch_array($result);

include 'head.php';

?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Recipe Details</h1>
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <?php
      echo '<article class="clearfix panel panel-default">';
      echo '<div class="col-xs-4"><img src="'. $found['picture'] .'" alt="Recipe" /> </div>';
      echo '<div class="col-xs-8"><h3>' . $found['recipeTitle'] . '</h3>';
      echo '<p>' . $found['recipeType'] . '</p>';
      echo '<p>Prep Time: ' . $found['prepTime'] . '</p>';
      echo '<p>Cook Time: ' . $found['cookTime'] . '</p>';
      echo '<p>' . $found['ingredients'] . '</p>';
      echo '<p>' . $found['instructions'] . '</p>';
      echo '<br /></div>';
      echo '</article>';
      
    ?>

  </div>
</div>

<?php include 'footer.php'; ?>
