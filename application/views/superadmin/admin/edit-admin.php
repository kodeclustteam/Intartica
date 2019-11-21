<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Admin</li>
</ol>
<!-- Page Content -->
<h4>Edit Admin
  <a href="<?php echo base_url('superadmin/admins') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <form action="<?php echo base_url('superadmin/admins/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
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
        <label for="fname">First Name :</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required value="<?php echo $row->fname ?>">
      </div>
      <div class="form-group">
        <label for="lname">Last Name :</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required value="<?php echo $row->lname ?>">
      </div>
      <div class="form-group">
        <label for="email">Email Address :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="<?php echo $row->email ?>">
      </div>
      <div class="form-group">
        <label for="password">Password :</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required value="<?php echo $row->password ?>">
      </div>
      <div class="form-group">
        <label for="admin_status">Status :</label>
        <select name="admin_status" class="form-control" required>
          <option value="" selected disabled>Select Status</option>
          <option value="Active" <?php if($row->admin_status=='Active')echo "selected" ?>>Active</option>
          <option value="In-active" <?php if($row->admin_status=='In-active')echo "selected" ?>>In-active</option>
        </select>
      </div>
      <div class="form-group">
        <label for="roles">Select Roles :</label><br>
        <select name="roles[]" required class="multipleSelect" multiple>
          <?php foreach($roles as $role): ?>
            <?php $role_array = explode(',', $row->roles); ?>
            <option value="<?php echo strtolower($role->role_name) ?>" <?php if(in_array(strtolower($role->role_name), $role_array))echo "selected"; ?>><?php echo ucwords($role->role_name) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
  </div>
</div>

