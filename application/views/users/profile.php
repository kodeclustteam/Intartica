<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('users/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit <?php echo ucfirst($user_type) ?></li>
</ol>
<!-- Page Content -->
<h4>Edit <?php echo ucfirst($user_type) ?>
  <a href="<?php echo base_url('users/dashboard') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <!-- <div class="col-2"></div> -->
  <div class="col-12">
  	<?php if($this->session->flashdata('error')): ?>
  		<?php echo $this->session->flashdata('error'); ?>
  	<?php endif; ?>
    <form action="<?php echo base_url('users/profile/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
    <?php if($user_type == 'employee'): ?>
      <!-- <div class="row">
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
      </div> -->
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
            <input type="text" class="form-control" id="adhaar_number" name="adhaar_number" placeholder="Enter Adhaar Number" readonly required value="<?php echo $row->adhaar_number ?>">
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
        <div class="col-sm-4">
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" class="form-control" required placeholder="Enter Address"><?php echo $row->address ?></textarea>
          </div>
        </div>
      </div>
      <?php elseif($user_type == 'customer'): ?>
      	<div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control" id="name" value="<?php echo $row->name ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="profession">Profession :</label>
            <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession" required value="<?php echo $row->profession ?>">
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
            <label for="dob">DOB :</label>
            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Email" required value="<?php echo $row->dob ?>">
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
      <?php elseif($user_type == 'vendor'): ?>
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
        <div class="col-sm-12">
          <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" class="form-control" required placeholder="Enter Address"><?php echo $row->address ?></textarea>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
