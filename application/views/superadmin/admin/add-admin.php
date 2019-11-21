<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Admin</li>
</ol>
<!-- Page Content -->
<h4>Add Admin
  <a href="<?php echo base_url('superadmin/admins') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/admins/add_submit') ?>" method="post" enctype="multipart/form-data">
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
        <label for="fname">First Name :</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
      </div>
      <div class="form-group">
        <label for="lname">Last Name :</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
      </div>
      <div class="form-group">
        <label for="password">Password :</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>
      <div class="form-group">
        <label for="roles">Select Roles :</label><br>
        <select name="roles[]" required class="multipleSelect" multiple>
          <?php foreach($roles as $row): ?>
            <option value="<?php echo strtolower($row->role_name) ?>"><?php echo ucwords($row->role_name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

