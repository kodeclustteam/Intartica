<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Employee</li>
</ol>
<!-- Page Content -->
<h4>Edit Employee
  <a href="<?php echo base_url('admin/employees') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <!-- <div class="col-2"></div> -->
  <div class="col-12">
    <form action="<?php echo base_url('admin/employees/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="org_id">Organization Name :</label>
            <select name="org_id" required class="form-control">
              <option value="" selected disabled>Select Organization</option>
              <?php foreach($organizations as $org): ?>
                <option value="<?php echo $org->id ?>" <?php if($org->id==$row->org_id)echo "selected"; ?>><?php echo ucwords($org->org_name) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="branch_id">Branch Name :</label>
            <select name="branch_id" required class="form-control">
              <option value="" selected disabled>Select Branch</option>
              <?php foreach($branches as $branch): ?>
                <option value="<?php echo $branch->id ?>" <?php if($branch->id==$row->branch_id)echo "selected"; ?>><?php echo ucwords($branch->branch_name) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="dept_id">Department Name :</label>
            <?php $dept_array = explode(',', $row->dept_id); ?>
            <select name="dept_id[]" required class="form-control multipleSelect" multiple>
              <?php foreach($departments as $dept): ?>
                <option value="<?php echo $dept->id ?>" <?php if(in_array($dept->id, $dept_array))echo "selected"; ?>><?php echo $dept->dept_name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required value="<?php echo $row->fname ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required value="<?php echo $row->lname ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="dob">DOB :</label>
            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Email" required value="<?php echo $row->dob ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="pan_number">PAN Number :</label>
            <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="Enter PAN Number" required value="<?php echo $row->pan_number ?>" readonly>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="adhaar_number">Adhaar Number :</label>
            <input type="text" class="form-control" id="adhaar_number" name="adhaar_number" placeholder="Enter Adhaar Number" required value="<?php echo $row->adhaar_number ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="primary_mobile">Primary Contact :</label>
            <input type="number" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Enter Primary Contact Number" required value="<?php echo $row->primary_mobile ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="alternate_mobile">Alternate Contact :</label>
            <input type="number" class="form-control" id="alternate_mobile" name="alternate_mobile" placeholder="Enter Alternate Contact Number" required value="<?php echo $row->alternate_mobile ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required readonly value="<?php echo $row->email ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required value="<?php echo $row->password ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="salary_structure">Salary Structure :</label>
            <input type="text" name="salary_structure" id="salary_structure" placeholder="Enter Salary Structure" class="form-control" required value="<?php echo $row->salary_structure ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="proof_type_image">Upload Proof :</label>
            <input type="file" name="proof_type_image" id="proof_type_image" placeholder="Enter Salary Structure" class="form-control" accept=".jpg, .png, .jpeg">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="proof_type">Proof Type :</label>
            <select name="proof_type" required class="form-control">
              <option value="" selected disabled>Select Proof Type</option>
              <option value="PAN" <?php if($row->proof_type=='PAN')echo "selected"; ?>>PAN</option>
              <option value="Adhaar" <?php if($row->proof_type=='Adhaar')echo "selected"; ?>>Adhaar</option>
              <option value="Passport" <?php if($row->proof_type=='Passport')echo "selected"; ?>>Passport</option>
              <option value="Other" <?php if($row->proof_type=='Other')echo "selected"; ?>>Other</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-sm-4">
          <div class="form-group">
            <label for="profile_pic">Upload Photo :</label>
            <input type="file" class="form-control" name="profile_pic" id="profile_pic" placeholder="Enter Primary Contact Number" accept=".jpg,.png, .jpeg">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="emp_status">Status :</label>
            <select name="emp_status" required class="form-control">
              <option value="" selected disabled>Select Status</option>
              <option value="Active" <?php if($row->emp_status=='Active')echo "selected"; ?>>Active</option>
              <option value="In-active" <?php if($row->emp_status=='In-active')echo "selected"; ?>>In-active</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" class="form-control" required placeholder="Enter Address"><?php echo $row->address ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="emp_status">Employee Profile :</label><br>
            <img src="<?php echo base_url('admin_uploads/employees_profiles/'.$row->id.'.jpg') ?>" height="200">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="address">Employee Proof :</label><br>
            <img src="<?php echo base_url('admin_uploads/employees_proof/'.$row->id.'.jpg') ?>" height="200">
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
