<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Sub Category</li>
</ol>
<!-- Page Content -->
<h4>Edit Sub Category
  <a href="<?php echo base_url('admin/categories/view_subcategory/'.$cat_id) ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <form action="<?php echo base_url('admin/categories/edit_subcatsubmit/'.$row->id.'/'.$cat_id) ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="subcat_name">Sub Category Name :</label>
            <input type="text" name="subcat_name" class="form-control" required placeholder="Enter Sub Category Name" value="<?php echo $row->subcat_name ?>">
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
            <label for="subcat_desc">Description :</label>
            <input type="text" name="subcat_desc" class="form-control" required placeholder="Enter Category Description" value="<?php echo $row->subcat_desc ?>">
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
