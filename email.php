<?php
require_once('variable.php');

$id = $_GET['id'];

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM recipe_manager WHERE id=$id";

$result = mysqli_query($dbconnect, $query) or die('email query failed');

$found = mysqli_fetch_array($result);

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
      <form action="sendEmail.php" method="POST" enctype="multipart/form-data">
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

						<input type="submit" value="Send" class="submitBtn btn btn-success btn-lg-2" id="submit" />

					</div>
      	</form><!-- End contact-form -->
			<br />
</article><!--End article-->
</div>
</div>
  
<?php include 'footer.php'; ?>
