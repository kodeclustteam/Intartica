<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Calender Year</li>
</ol>
<!-- Page Content -->
<h4>Edit Calender Year
  <a href="<?php echo base_url('admin/calender') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/calender/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="calender_year">Calender Year :</label>
            <select class="form-control" name="calender_year" required>
              <option value="" selected disabled>--Select Calender Year--</option>
              <option value="FY19[2018-2019]" <?php if($row->calender_year=='FY19[2018-2019]')echo "selected"; ?>>FY19[2018-2019]</option>
              <option value="FY20[2019-2020]" <?php if($row->calender_year=='FY20[2019-2020]')echo "selected"; ?>>FY20[2019-2020]</option>
              <option value="FY21[2020-2021]" <?php if($row->calender_year=='FY21[2020-2021]')echo "selected"; ?>>FY21[2020-2021]</option>
              <option value="FY22[2021-2022]" <?php if($row->calender_year=='FY22[2021-2022]')echo "selected"; ?>>FY22[2021-2022]</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="status">Calender Status :</label>
            <select class="form-control" name="status" required>
              <option value="" selected disabled>--Select Status--</option>
              <option value="Active" <?php if($row->status=='Active')echo "selected"; ?>>Active</option>
              <option value="In-active" <?php if($row->status=='In-active')echo "selected"; ?>>In-active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
