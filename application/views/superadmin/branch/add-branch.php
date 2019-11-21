<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Branch</li>
</ol>
<!-- Page Content -->
<h4>Add Branch
  <a href="<?php echo base_url('superadmin/branches') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/branches/add_submit') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="org_id">Organization Name :</label>
        <select name="org_id" id="org_id" required class="form-control">
          <option value="" selected disabled>Select Organization Name</option>
          <?php foreach($organizations as $row): ?>
            <option value="<?php echo $row->id ?>"><?php echo ucwords($row->org_name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="branch_name">Branch Name :</label>
        <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
  </div>
</div>

