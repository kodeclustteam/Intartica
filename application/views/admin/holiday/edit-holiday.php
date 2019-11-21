<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Holiday</li>
</ol>
<!-- Page Content -->
<h4>Edit Holiday
  <a href="<?php echo base_url('admin/holidays') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/holidays/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="holiday_name">Holiday Name :</label>
            <input type="text" name="holiday_name" id="holiday_name" class="form-control" placeholder="Enter Holiday Name" required value="<?php echo $row->holiday_name ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="status">Status :</label>
            <select class="form-control" name="status" required>
              <option value="" selected disabled>--Select Status--</option>
              <option value="Active" <?php if($row->status=='Active')echo "selected"; ?>>Active</option>
              <option value="In-active" <?php if($row->status=='In-active')echo "selected"; ?>>In-active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="holiday_date">Holiday Date :</label>
            <input type="date" name="holiday_date" id="holiday_date" class="form-control" placeholder="Enter Holiday Name" required value="<?php echo $row->holiday_date ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="calender_year">Calender Year :</label>
            <input type="text" name="calender_year" id="calender_year" class="form-control" placeholder="Enter Holiday Name" readonly value="<?php echo $row->calender_year ?>">
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
