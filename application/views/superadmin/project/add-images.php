<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Images</li>
</ol>
<!-- Page Content -->
<h4>Add Images
  <a href="<?php echo base_url('superadmin/projects/all_images/'.$id) ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-eye"></i> View Images</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/projects/add_image_submit/'.$id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="image">Upload Photo :</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Phone Number" required>
      </div>
      <div class="form-group">
        <label for="photo_type">Photo Type :</label>
        <select name="photo_type" class="form-control" required>
          <option value="" selected disabled>Select Photo Type</option>
          <option value="kitchen">Kitchen</option>
          <option value="bedroom">Bedroom</option>
          <option value="dinning-room">Dinning Room</option>
          <option value="living-room">Living Room</option>
          <option value="bathroom">Bathroom</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
      <a href="<?php echo base_url('superadmin/projects') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
    </form>
  </div>
</div>

