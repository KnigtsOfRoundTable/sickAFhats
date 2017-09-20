<?php
 $queryAddition= '';

if(isset($_GET[specialty_id])){
 $queryAddition = "WHERE specialty_id=$_GET[specialty_id]";
}

require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query1 = "SELECT * FROM chef INNER JOIN chef_specialty ON (chef_specialty.spec_id = chef.specialty_id) $queryAddition ORDER BY id";
$result1 = mysqli_query($dbconnect, $query1) or die('display query failed');

include 'head.php';
 ?>

<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Our Chefs</h1>
    <h2>Search for a Chef based on their Specialty</h2>

      <ul>
        <li style="display:inline;margin:0 20px;"><a href="purchaseHistory.php">All</a></li>
        <?php
        $query3 = "SELECT * FROM chef_specialty ORDER BY value";
        $result3 = mysqli_query($dbconnect, $query3) or die('login query failed');

          while($row3 = mysqli_fetch_array($result3)){
            echo '<li style="display:inline;margin:0 20px;"><a href="purchaseHistory.php?specialty_id='.$row3['spec_id'].'">'.$row3['value'].'</a></li>';
          }
         ?>
      </ul>
      <br /><br />
  </div>
</div>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
  <?php

  if(mysqli_num_rows($result1) == 0){
      echo '<article class="clearfix panel panel-default"><div class="col-xs-12"><h3 class="text-center">No matches for your search</h3></div></article>';
  };


  while($row = mysqli_fetch_array($result1)){
    echo '<div class="col-xs-4"><article style="height: 400px;"class="clearfix panel panel-default">';
    echo  '<div class="col-xs-12"><h3>' . $row['first'] . ' ' . $row['last'] . '</h3><p>';
    echo ($row['gender'] == 1 ? 'Head Chef ' : 'Assistant Chef ');
    echo $row['first'] . ' specializes in ' . $row['value'] . ' Cuisine.</p><p>';
    echo ($row['gender'] == 1 ? 'Head Chef ' : 'Assistant Chef ');
    echo $row['first'] . ' has the following skills:</p>';

    $currentID = $row[id];
    $query2 = "SELECT * FROM chef_skillSet INNER JOIN chef_skills ON (chef_skillSet.skill_id = chef_skills.id) WHERE chef_id=$currentID";
    $result2 = mysqli_query($dbconnect, $query2) or die('skills query failed');

      while($row2 = mysqli_fetch_array($result2)){
        echo '<ul>';
        echo '<li>' . $row2['value'] . '</li>';
        echo '</ul>';

    };

    echo  '</div></article></div>';

  };
  ?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 text-center">
      <br /><br />
      <a href="form.php" class="padding-sm"><button class="btn btn-success btn-lg">Add a New Chef</button></a>
      <br /><br /><br /><br />
    </div>
</div>

<?php include 'footer.php'; ?>
