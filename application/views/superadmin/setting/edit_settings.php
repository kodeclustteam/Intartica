<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Website Edit Settings</li>
</ol>
<!-- Page Content -->
<h4>Website Edit Settings</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/settings/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="phone">Phone Number :</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required value="<?php echo $row->phone ?>">
      </div>
      <div class="form-group">
        <label for="email">Email Address :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required value="<?php echo $row->email ?>">
      </div>
      <div class="form-group">
        <label for="map">Google Map :</label>
        <textarea class="form-control" rows="6" required name="map" placeholder="Enter Google Map Script"><?php echo $row->map ?></textarea>
      </div>
      <div class="form-group">
        <label for="image">Logo :</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Phone Number">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <div class="row">
      <div class="col-sm-6">
        <img src="<?php echo base_url('settings/'.$row->id.'.jpg') ?>" height="150">
      </div>
      <div class="col-sm-6">
        <?php echo $row->map ?>
      </div>
    </div>
  </div>
</div>

