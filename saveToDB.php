<?php
$mem_id = $_COOKIE['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$creditcard = $_POST['creditcard'];
$subTotal = $_POST['subTotal'];
$productArray = $_POST['productArray'];
$titleArray = $_POST['titleArray'];
$amountArray = $_POST['amountArray'];

require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$query = "INSERT INTO send_information (subtotal, name, email, phone, address, creditcard) VALUES ('$subtotal', '$name', '$email', '$phone', '$address', '$creditcard')";
$result = mysqli_query($dbconnect, $query) or die('add to db query failed');

$recent_id = mysqli_insert_id($dbconnect);

foreach($_POST['skills'] as $skillSet_id){
  $query = "INSERT INTO chef_skillSet (chef_id, skill_id) VALUES ('$recent_id', '$skillSet_id')";
  $result = mysqli_query($dbconnect, $query) or die('login query failed');
};

mysqli_close($dbconnect);

print_r( $_POST );
print_r( $titleArray );
print_r( $amountArray );
print_r( $productArray );

?>
