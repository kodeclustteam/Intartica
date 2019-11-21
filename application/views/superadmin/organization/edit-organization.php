<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Organization</li>
</ol>
<!-- Page Content -->
<h4>Edit Organization
  <a href="<?php echo base_url('superadmin/organizations') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/organizations/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="org_name">Organization Name :</label>
        <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Enter Organization Name" required value="<?php echo $row->org_name ?>">
      </div>
      <div class="form-group">
        <label for="org_status">Organization Status :</label>
        <select name="org_status" class="form-control" required>
          <option value="" selected disabled>Select Status</option>
          <option value="Active" <?php if($row->org_status=='Active')echo "selected" ?>>Active</option>
          <option value="In-active" <?php if($row->org_status=='In-active')echo "selected" ?>>In-active</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
  </div>
</div>

