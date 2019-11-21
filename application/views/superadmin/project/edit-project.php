<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Project</li>
</ol>
<!-- Page Content -->
<h4>Edit Project
  <a href="<?php echo base_url('superadmin/projects') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/projects/edit_submit/'.$data->id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="project_category_id">Project Category :</label>
        <select class="form-control" name="project_category_id" required>
          <option value="" selected disabled>Select Project Category</option>
          <?php foreach($categories as $row): ?>
            <option value="<?php echo $row->id ?>" <?php if($row->id==$data->project_category_id)echo "selected"; ?>><?php echo $row->category_title ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="cus_name">Customer Name :</label>
        <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Enter Customer Name" required value="<?php echo $data->cus_name ?>">
      </div>
      <div class="form-group">
        <label for="house_type">House Type :</label>
        <select name="house_type" class="form-control" required>
          <option value="" selected disabled>Select House Type</option>
          <option value="1-BHK" <?php if($data->house_type=='1-BHK')echo "selected"; ?>>1-BHK</option>
          <option value="2-BHK" <?php if($data->house_type=='2-BHK')echo "selected"; ?>>2-BHK</option>
          <option value="3-BHK" <?php if($data->house_type=='3-BHK')echo "selected"; ?>>3-BHK</option>
          <option value="4-BHK" <?php if($data->house_type=='4-BHK')echo "selected"; ?>>4-BHK</option>
          <option value="villa" <?php if($data->house_type=='villa')echo "selected"; ?>>Villa</option>
        </select>
      </div>
      <div class="form-group">
        <label for="apart_name">Apartment Name :</label>
        <input type="text" class="form-control" id="apart_name" name="apart_name" placeholder="Enter Apartment Name" required value="<?php echo $data->apart_name ?>">
      </div>
      <div class="form-group">
        <label for="image">Upload Photo :</label>
        <input type="file" class="form-control" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="photo_type">Photo Type :</label>
        <select name="photo_type" class="form-control" required>
          <option value="" selected disabled>Select Photo Type</option>
          <option value="kitchen" <?php if($data->photo_type=='kitchen')echo "selected"; ?>>Kitchen</option>
          <option value="bedroom" <?php if($data->photo_type=='bedroom')echo "selected"; ?>>Bedroom</option>
          <option value="dinning-room" <?php if($data->photo_type=='dinning-room')echo "selected"; ?>>Dinning Room</option>
          <option value="living-room" <?php if($data->photo_type=='living-room')echo "selected"; ?>>Living Room</option>
          <option value="bathroom" <?php if($data->photo_type=='bathroom')echo "selected"; ?>>Bathroom</option>
        </select>
      </div>
      <div class="form-group">
        <label for="image">Old Photo :</label>
        <img src="<?php echo base_url('projects-images/'.$data->id.'.jpg') ?>" height="100">
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
  </div>
</div>

