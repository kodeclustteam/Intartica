<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Leave</li>
</ol>
<!-- Page Content -->
<h4>Edit Leave
  <a href="<?php echo base_url('admin/leaves') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/leaves/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="active_calender_year">Active Calender Year :</label>
            <input type="text" name="active_calender_year" placeholder="Enter Calender Year" class="form-control" id="active_calender_year" readonly value="<?php echo $row->active_calender_year ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="leave_type">Leave Type :</label>
            <select class="form-control" name="leave_type" required>
              <option value="" selected disabled>--Select Leave Type--</option>
              <option value="Casual Leave" <?php if($row->leave_type=='Casual Leave')echo "selected"; ?>>Casual Leave</option>
              <option value="Sick Leave" <?php if($row->leave_type=='Sick Leave')echo "selected"; ?>>Sick Leave</option>
              <option value="LOP" <?php if($row->leave_type=='LOP')echo "selected"; ?>>LOP</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="leave_limit">Leave Limit :</label>
            <input type="number" class="form-control" id="leave_limit" name="leave_limit" placeholder="Enter Leave Limit" required value="<?php echo $row->leave_limit ?>">
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
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
