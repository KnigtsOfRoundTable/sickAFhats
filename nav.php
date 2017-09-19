<nav>

<ul class="nav nav-tabs">
  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="recipe.php"><i class="fa fa-lemon-o"></i> Recipes</a></li>
  <li><a href="chefs.php"><i class="fa fa-lemon-o"></i> Chefs</a></li>
  <?php
      if(isset($_COOKIE['username'])){
        echo '<li><a href="manage.php"><i class="fa fa-folder-o"></i> Manage</a></li>';
      }
  ?>
</ul>

<div class="searchDesk">
  <?php
      if(isset($_COOKIE['username'])){
        echo 'Welcome, ';
        echo $_COOKIE['first'] . ' ' . $_COOKIE['last'];
        echo ' | <a href="logout.php">log out</a>';
      }else{
        echo '<a href="login.php">Log in</a>';
      }
    ?>
</div>

</nav><!-- end Navigation -->


