<?php
$id = $_GET['id'];
require_once('protect.php');
require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "DELETE FROM recipe_manager WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die('delete query failed');

header('Location: manage.php');

 ?>
