<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url(); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Settings</li>
</ol>
<!-- Page Content -->
<h4>Add Settings
   <a href="<?php echo base_url('dashboard/all_settings') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('dashboard/add') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="phone">Phone Number :</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
      </div>
      <div class="form-group">
        <label for="map">Google Map :</label>
        <textarea class="form-control" rows="6" required name="map" placeholder="Enter Google Map Script"></textarea>
      </div>
      <div class="form-group">
        <label for="image">Logo :</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Phone Number" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

