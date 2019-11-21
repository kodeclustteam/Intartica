<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Project</li>
</ol>
<!-- Page Content -->
<h4>Add Project
  <a href="<?php echo base_url('superadmin/projects') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('superadmin/projects/add_submit') ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="project_category_id">Project Category :</label>
            <select class="form-control" name="project_category_id" required>
              <option value="" selected disabled>Select Project Category</option>
              <?php foreach($categories as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->category_title ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="cus_name">Customer Name :</label>
            <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Enter Customer Name" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="house_type">House Type :</label>
            <select name="house_type" class="form-control" required>
              <option value="" selected disabled>Select House Type</option>
              <option value="1-BHK">1-BHK</option>
              <option value="2-BHK">2-BHK</option>
              <option value="3-BHK">3-BHK</option>
              <option value="4-BHK">4-BHK</option>
              <option value="villa">Villa</option>
            </select>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="apart_name">Apartment Name :</label>
            <input type="text" class="form-control" id="apart_name" name="apart_name" placeholder="Enter Apartment Name" required>
          </div>
        </div> 
      </div>
      <div class="row" id="append_more">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="image">Upload Photo :</label>
            <input type="file" class="form-control" name="image[]" required>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="photo_type">Photo Type :</label>
            <select name="photo_type[]" class="form-control" required>
              <option value="" selected disabled>Select Photo Type</option>
              <option value="kitchen">Kitchen</option>
              <option value="bedroom">Bedroom</option>
              <option value="dinning-room">Dinning Room</option>
              <option value="living-room">Living Room</option>
              <option value="bathroom">Bathroom</option>
            </select>
          </div>
        </div>
        <div class="col-sm-1">
          <label for="add"></label>
          <button type="button" id="add" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i></button>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
