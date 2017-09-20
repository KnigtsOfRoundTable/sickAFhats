<?php
require_once('variable.php');

$subject = $_POST['subject'];
$message = $_POST['message'];
$id = $_COOKIE['id'];
$from = "kylejohnson2612@gmail.com";

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM member WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die('send message query failed');

while($row = mysqli_fetch_array($result)){
  $to = $row['email'];
  $newMessage = "Hi,\n $message";

  mail($to, $subject, $newMessage, 'From:' . $from);

};

mysqli_close($dbconnect);

include 'head.php';  

?>
<br /><br />
<div class="row">
<div class="col-xs-1"></div>
  <div class="col-xs-10 text-center">
    <article class="clearfix panel panel-default">
      <?php
      echo '<h1> Thanks you</h1><p>A representative will contact you shortly. </p>';
      ?>
      <br /><br />
    </article>
  </div>
</div>
<br /><br />

<?php include 'footer.php'; ?>
