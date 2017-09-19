<?php
require_once('variable.php');

$email = $_POST['email'];
$recipeTitle = $_POST['recipeTitle'];
$recipeType = $_POST['recipeType'];
$prepTime = $_POST['prepTime'];
$cookTime = $_POST['cookTime'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];
$picture = $_POST['picture'];
$id = $_POST['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager WHERE id='$id'";

$result = mysqli_query($dbconnect, $query) or die('update query failed');

$found = mysqli_fetch_array($result);

include 'head.php';

$ext =  pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
$filename = $recipeTitle . '.' . $ext;
$filepath = 'img/';
$picturename = $filepath . $filename;
$validImage = true;

echo  '<br /><br /><div class="row"><div class="col-xs-1"></div><div class="col-xs-10"><article class="clearfix panel panel-default">';

if ($_FILES['picture']['size'] == 0){
      $_FILES['picture'] == $found['picture'];
      $picturename = $found['picture'];
      $validImage = true;
      
};

if ($validImage == true){

    $tmp_name = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_name, $picturename);
    @unlink($_FILES['picture']['tmp_name']);

    $dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

    $query = "UPDATE recipe_manager SET email='$email', recipeTitle='$recipeTitle', recipeType='$recipeType', prepTime='$prepTime',  cookTime='$cookTime', ingredients='$ingredients', instructions='$instructions', picture='$picturename' WHERE id=$id";

    $result = mysqli_query($dbconnect, $query) or die('update db query failed');

    mysqli_close($dbconnect);

    echo '<h1 class="text-center">Recipe has been Updated</h1>';

    header( "refresh:3;url=manage.php" );

}else{
    echo '<br /><div class="text-center"><a href="add.php"> Please upload file again</a></div><br />';
};

echo  '</article></div></div>';

include 'footer.php'; 

?>
