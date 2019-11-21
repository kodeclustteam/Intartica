<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Vendor</li>
</ol>
<!-- Page Content -->
<h4>Add Vendor
  <a href="<?php echo base_url('admin/vendors') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/vendors/add_submit') ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control" id="name">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="gstin_tin_number">GSTIN/TIN Number :</label>
            <input type="text" class="form-control" id="gstin_tin_number" name="gstin_tin_number" placeholder="Enter GSTIN/TIN Number" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
          </div>
        </div> 
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="primary_mobile">Primary Contact :</label>
            <input type="number" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Enter Primary Contact Number" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="alternate_mobile">Alternate Contact :</label>
            <input type="number" name="alternate_mobile" id="alternate_mobile" placeholder="Enter Alternate Contact Number" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-6">
          <div class="form-group">
            <label for="dob">DOB :</label>
            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Email" required>
          </div>
        </div> -->
        <div class="col-sm-12">
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" class="form-control" required placeholder="Enter Address"></textarea>
          </div>
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
