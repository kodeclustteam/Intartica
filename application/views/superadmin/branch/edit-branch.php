<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Branch</li>
</ol>
<!-- Page Content -->
<h4>Edit Branch
  <a href="<?php echo base_url('superadmin/branches') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/branches/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="org_id">Organization Name :</label>
        <select name="org_id" id="org_id" required class="form-control">
          <option value="" selected disabled>Select Organization Name</option>
          <?php foreach($organizations as $org): ?>
            <option value="<?php echo $org->id ?>" <?php if($org->id==$row->org_id)echo "selected"; ?>><?php echo ucwords($org->org_name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="branch_name">Branch Name :</label>
        <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" required value="<?php echo $row->branch_name ?>">
      </div>
      <div class="form-group">
        <label for="branch_status">Branch Status :</label>
        <select name="branch_status" class="form-control" required>
          <option value="" selected disabled>Select Status</option>
          <option value="Active" <?php if($row->branch_status=='Active')echo "selected" ?>>Active</option>
          <option value="In-active" <?php if($row->branch_status=='In-active')echo "selected" ?>>In-active</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
  </div>
</div>

