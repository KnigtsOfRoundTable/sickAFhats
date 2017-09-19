<?php
require_once('protect.php');
require_once('variable.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager WHERE id='$id'";

$result = mysqli_query($dbconnect, $query) or die('update query failed');

$found = mysqli_fetch_array($result);

include 'head.php'; 

?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Update Recipe</h1>
    <br /><br />
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <article class="clearfix panel panel-default">

      <form action="updateDatabase.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
      <div class="form-group">
          <span>Email <input type="text" name="email" value="<?php echo $found['email'] ?>" class="form-control "></span>
        </div>
        <div class="form-group">
          <span>Recipe Title <input type="text" name="recipeTitle" value="<?php echo $found['recipeTitle'] ?>" placeholder="Chili Hamburger" class="form-control "></span>
        </div>

        <div class="form-group">
          <span>Recipe Type <input type="text" name="recipeType" value="<?php echo $found['recipeType'] ?>" placeholder="Breakfast/Lunch/Dinner" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Prep Time <input type="number" name="prepTime" value="<?php echo $found['prepTime'] ?>" placeholder="30" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Cook Time <input type="number" name="cookTime" value="<?php echo $found['cookTime'] ?>" placeholder="20" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Ingredients <input type="text" name="ingredients" value="<?php echo $found['ingredients'] ?>" placeholder="2 apples, 5 oranges, 4 bananas" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Instructions <input type="textarea" name="instructions" value="<?php echo $found['instructions'] ?>" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Photo<input type="file" name="picture" value="<?php echo $found['picture'] ?>" placeholder="<?php echo $found['picture'] ?>" class="form-control"></span>
        </div>

        <input type="hidden" name="id" value=" <?php echo $found['id'] ?> ">

        <br /><br />
        <div class="text-center">
          <input type="submit"  class="btn btn-lg btn-success" name="submit" value="Update" id="submit"/>
        </div>
        <br /><br />

    </form>
    </article>
  </div>
</div>
  
<?php include 'footer.php'; ?>
