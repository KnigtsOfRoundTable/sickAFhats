<?php
$first = $_POST['first'];
$last = $_POST['last'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$specialty = $_POST['specialty'];

require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "INSERT INTO chef (first, last, gender, email, specialty_id) VALUES ('$first', '$last', '$gender', '$email', '$specialty')";
$result = mysqli_query($dbconnect, $query) or die('add to db query failed');

$recent_id = mysqli_insert_id($dbconnect);

foreach($_POST['skills'] as $skillSet_id){
  $query = "INSERT INTO chef_skillSet (chef_id, skill_id) VALUES ('$recent_id', '$skillSet_id')";
  $result = mysqli_query($dbconnect, $query) or die('login query failed');
};

mysqli_close($dbconnect);

header('Location: purchaseHistory.php');

?>
