<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Category</li>
</ol>
<!-- Page Content -->
<h4>Edit Category
  <a href="<?php echo base_url('admin/categories') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/categories/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="cat_name">Category Name :</label>
            <input type="text" name="cat_name" class="form-control" required placeholder="Enter Category Name" value="<?php echo $row->cat_name ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="status">Status :</label>
            <select class="form-control" name="status" required>
              <option value="" selected disabled>--Select Status--</option>
              <option value="Active" <?php if($row->status=='Active')echo "selected"; ?>>Active</option>
              <option value="In-active" <?php if($row->status=='In-active')echo "selected"; ?>>In-active</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="cat_description">Description :</label>
            <input type="text" name="cat_description" class="form-control" required placeholder="Enter Category Description" value="<?php echo $row->cat_description ?>">
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
