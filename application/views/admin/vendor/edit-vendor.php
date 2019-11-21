<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Vendor</li>
</ol>
<!-- Page Content -->
<h4>Edit Vendor
  <a href="<?php echo base_url('admin/vendors') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/vendors/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control" id="name" value="<?php echo $row->name ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="gstin_tin_number">GSTIN/TIN Number :</label>
            <input type="text" class="form-control" id="gstin_tin_number" name="gstin_tin_number" placeholder="Enter GSTIN/TIN Number" required value="<?php echo $row->gstin_tin_number ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required value="<?php echo $row->fname ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required value="<?php echo $row->lname ?>">
          </div>
        </div> 
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required readonly value="<?php echo $row->email ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required value="<?php echo $row->password ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="primary_mobile">Primary Contact :</label>
            <input type="number" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Enter Primary Contact Number" required value="<?php echo $row->primary_mobile ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="alternate_mobile">Alternate Contact :</label>
            <input type="number" name="alternate_mobile" id="alternate_mobile" placeholder="Enter Alternate Contact Number" class="form-control" required value="<?php echo $row->alternate_mobile ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="vendor_status">Status :</label>
            <select name="vendor_status" required class="form-control">
              <option value="" disabled selected>Select Status</option>
              <option value="Active" <?php if($row->vendor_status=='Active')echo "selected"; ?>>Active</option>
              <option value="In-active" <?php if($row->vendor_status=='In-active')echo "selected"; ?>>In-active</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" class="form-control" required placeholder="Enter Address"><?php echo $row->address ?></textarea>
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
