<?php include 'head.php'; ?>
<div class="row">
  <div class="col-xs-12 text-center">
    <h1>Add your Product</h1>
    <br /><br />
  </div>
</div>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <article class="clearfix panel panel-default">
      <form action="add2.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <span>Title <input type="text" name="title" required value="" class="form-control " /></span>
          </div>
          <div class="form-group">
            <span>Short Description <input type="textarea" required name="shortdescription" value="" class="form-control " /></span>
          </div>

          <div class="form-group">
            <span>Long Description <input type="textarea" required name="longdescription" value="" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Price $<input type="number" required name="price" value="" placeholder="30.00" step=".01" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Shipping $<input type="number" required name="shipping" value="" placeholder="20.00" step=".01" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Tax $<input type="number" required name="tax" value="" placeholder="0.06" step=".01" class="form-control" /></span>
          </div>

          <div class="form-group">
            <span>Photo (300px x 300px)<input type="file" name="picture" value="" class="form-control" /></span>
          </div>

          <br /><br />

          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg" name="submit">Add Product</button>
          </div>

          <br /><br />
          
      </form>
    </article>
  </div>
  <div class="col-xs-1"></div>
  </div>
</div>
  
  <?php include 'footer.php'; ?>
