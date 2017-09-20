<?php
require_once('variable.php');

if(isset($_POST['submit'])){

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');
$id = $_COOKIE['id'];
$query = "SELECT * FROM member WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die('email query failed');

$found = mysqli_fetch_array($result);

$email = $found['email'];
$subject = $_POST[subject];
$message = $_POST[message];

//Write the Email
$to = 'kylejohnson2612@gmail.com';

//Send the Email
mail($to, $subject, $message, 'FROM:'.$email);

};


include 'head.php';

?>
<div class="row">
  <div class="col-sm-12 text-center">
  <h1>Send Email</h1>
  </div>
</div>
<div class="row">
<div class="col-sm-1"></div>
  <div class="col-sm-10">
    <article class="clearfix panel panel-default">
      <form action="email.php" method="POST" enctype="multipart/form-data">
					<div class="col-sm-12">

						<div class="form-group">
						  <label class="control-label">Subject</label>
						  <div class="controls">
							<input id="subject" name="subject" placeholder="Subject" class="form-control input-lg requiredField" type="text" required="" oninvalid="this.setCustomValidity('Please enter your subject.')" oninput="setCustomValidity('')">
						  </div>
						</div><!-- End subject  input -->

            <div class="form-group">
						  <label class="control-label">Message</label>
						  <div class="controls">
              <textarea id="message" rows="8" cols="40" name="message" placeholder="Message" class="form-control input-lg" type="text" required="" oninvalid="this.setCustomValidity('Please enter your message.')" oninput="setCustomValidity('')"></textarea>
                <input type="hidden" name="id" value="<?php echo $found['id']; ?>">
						  </div>
						</div><!-- End message input -->

						<button type="submit" class="btn btn-success" name="submit">Send Email</button>

					</div>
      	</form><!-- End contact-form -->
			<br />
</article><!--End article-->
</div>
</div>
  
<?php include 'footer.php'; ?>
