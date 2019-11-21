<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Images</li>
</ol>
<!-- Page Content -->
<h4>Edit Images
  <a href="<?php echo base_url('superadmin/projects') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/projects/edit_image_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="image">Upload Photo :</label>
        <input type="file" class="form-control" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="photo_type">Photo Type :</label>
        <select name="photo_type" class="form-control" required>
          <option value="" selected disabled>Select Photo Type</option>
          <option value="kitchen" <?php if($row->photo_type=='kitchen')echo "selected"; ?>>Kitchen</option>
          <option value="bedroom" <?php if($row->photo_type=='bedroom')echo "selected"; ?>>Bedroom</option>
          <option value="dinning-room" <?php if($row->photo_type=='dinning-room')echo "selected"; ?>>Dinning Room</option>
          <option value="living-room" <?php if($row->photo_type=='living-room')echo "selected"; ?>>Living Room</option>
          <option value="bathroom" <?php if($row->photo_type=='bathroom')echo "selected"; ?>>Bathroom</option>
        </select>
      </div>
      <div class="form-group">
        <label for="image">Old Photo :</label>
        <img src="<?php echo base_url('projects-images/gallery/'.$row->id.'.jpg') ?>" height="100">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

