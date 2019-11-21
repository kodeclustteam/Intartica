<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Organization</li>
</ol>
<!-- Page Content -->
<h4>Add Organization
  <a href="<?php echo base_url('superadmin/organizations') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/organizations/add_submit') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="org_name">Organization Name :</label>
        <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Enter Organization Name" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

