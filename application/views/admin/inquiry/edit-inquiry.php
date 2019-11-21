<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Inquiry</li>
</ol>
<!-- Page Content -->
<h4>Edit Inquiry
  <a href="<?php echo base_url('admin/inquiry') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/inquiry/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" placeholder="Enter Name" class="form-control" id="name" value="<?php echo $row->name ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required value="<?php echo $row->email ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="phone">Phone :</label>
            <input type="number" name="phone" id="phone" placeholder="Enter Phone Number" class="form-control" required value="<?php echo $row->phone ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="message">Message :</label>
            <textarea name="message" class="form-control" required placeholder="Enter Message"><?php echo $row->message ?></textarea>
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
