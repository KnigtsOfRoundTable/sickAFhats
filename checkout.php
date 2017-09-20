<?php
require_once('variable.php');
$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM chef_specialty";
$resultSpec = mysqli_query($dbconnect, $query) or die('select specialty query failed');

$query2 = "SELECT * FROM chef_skills";
$resultSkills = mysqli_query($dbconnect, $query2) or die('select skills query failed');


include 'head.php';
 ?>
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
  <form action="saveToDB.php" method="POST" enctype="multipart/form-data" class="form-horizontal padding-sm">
    <div class="form-group ">
      <span>First Name<input type="text" name="first" value="" class="form-control" required></span>
    </div>

      <div class="form-group">
        <span>Last Name <input type="text" name="last" value="" class="form-control" required ></span>
      </div>

    <div class="form-group">
      <div style="margin-left: 10px;">
        <span><input type="radio" name="gender" value="1"> Head Chef</span>
      </div>
      <div style="margin-left: 10px;">
        <span><input type="radio" name="gender"  value="2"> Assistant Chef</span>
      </div>
    </div>

    <div class="form-group">
      <span>Email <input type="email" name="email" value="" class="form-control" required></span>
    </div>

    <div class="form-group">
      <span>Specialty <select name="specialty" class="form-control skills-list">
      <option>Please Select . . .</option>
        <?php
          while($row = mysqli_fetch_array($resultSpec)){
          echo '<option value="'.$row['spec_id'].'">'. $row['value'] .'</option>';
        };

        ?>
      </select></span>
    </div>

<hr>
<div class="form-group">
<span>Select Cooking Skills</span>
<br><br>
<?php
  while($row2 = mysqli_fetch_array($resultSkills)){
   echo '<span style="margin-left: 10px;"><input type="checkbox" value="'.$row2['id'].'" name="skills[]"> '.$row2['value'].'</span>';
   echo '<br>';
  };
?>
</div>

<br /><br />

          <div class="text-center">
  <button type="submit" class="btn btn-success btn-lg submit-btn" name="submit">Submit</button>
  </div>
  
            <br /><br />
  </form>
  </article>
  </div>
  <div class="col-xs-1"></div>
  </div>
</div>
  
  <?php include 'footer.php'; ?>
