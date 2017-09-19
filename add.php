<?php include 'head.php'; ?>
<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Add your Recipe</h1>
    <br /><br />
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <article class="clearfix panel panel-default">
      <form action="add2.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <span>Email <input type="text" name="email" required value="" class="form-control " /></span>
          </div>
          <div class="form-group">
            <span>Recipe Title <input type="text" required name="recipeTitle" value="" placeholder="Chili Hamburger" class="form-control " /></span>
          </div>

          <div class="form-group">
            <span>Recipe Type <input type="text" required name="recipeType" value="" placeholder="Breakfast/Lunch/Dinner" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Prep Time <input type="number" required name="prepTime" value="" placeholder="30" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Cook Time <input type="number" required name="cookTime" value="" placeholder="20" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Ingredients <input type="text" required name="ingredients" value="" placeholder="2 apples, 5 oranges, 4 bananas" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Instructions <input type="textarea" required name="instructions" value="" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Photo<input type="file" name="picture" value="" class="form-control" /></span>
          </div>

          <br /><br />

          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg" name="submit">Add Recipe</button>
          </div>

          <br /><br />
          
      </form>
    </article>
  </div>
  <div class="col-xs-1"></div>
  </div>
</div>
  
  <?php include 'footer.php'; ?>
