<nav>

<ul class="nav nav-tabs">
  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="products.php"><i class="fa fa-automobile"></i> Products</a></li>
  <li><a href="email.php"><i class="fa fa-bell"></i> Contact</a></li>
  <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart (<?php 
  $mem_id = $_COOKIE['id'];
  require_once('variable.php');
  $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
  $queryCheck = "SELECT * FROM cart";
  $resultCheck = mysqli_query($dbconnect, $queryCheck) or die('cart query failed');
  $cartCount = 0;
  while($rowCheck = mysqli_fetch_array($resultCheck)){
    if($rowCheck['mem_id'] == $mem_id){
      $cartCount += 1;
    };
  };
  echo $cartCount;
  
  
  
  ?>)</a></li>
</ul>

<div class="searchDesk">
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

</nav><!-- end Navigation -->


