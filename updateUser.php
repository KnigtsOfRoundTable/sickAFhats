<?php
require_once('protect.php');
require_once('variable.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM member WHERE id='$id'";

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

      <form action="updateUserDatabase.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
      <div class="form-group">
          <span>Name <input type="text" name="name" value="<?php echo $found['name'] ?>" class="form-control"></span>
        </div>
        <div class="form-group">
          <span>Email <input type="text" name="email" value="<?php echo $found['email'] ?>" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Phone <input type="tel" name="phone" value="<?php echo $found['phone'] ?>" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Address <input type="text" name="address" value="<?php echo $found['address'] ?>" class="form-control"></span>
        </div>

        <div class="form-group">
          <span>Credit Card <input type="number" name="creditcard" value="<?php echo $found['creditcard'] ?>" class="form-control"></span>
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
