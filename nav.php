<div class="myNavBar">

<ul class="mainNav">
  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="products.php"><i class="fa fa-automobile"></i> Products</a></li>
  <li><a href="email.php"><i class="fa fa-bell"></i> Contact</a></li>
  <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
</ul>

<div class="logNav">
  <?php
      if(isset($_COOKIE['username'])){
        echo 'Welcome, <a href="updateUser.php?id='.$_COOKIE['id'].'">';
        echo $_COOKIE['name'] . ' <i class="fa fa-chevron-down"></i> ';
        echo '</a> | <a href="logout.php">log out</a>';
      }else{
        echo '<a href="login.php">Log in</a>';
      }
    ?>
</div>

</div><!-- end myNavBar -->


