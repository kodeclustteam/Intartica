<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Sub Category List</li>
</ol>
<!-- Page Content -->
<h4>Sub Category List
  <a href="<?php echo base_url('admin/categories') ?>" class="btn btn-primary float-sm-right"><i class="fa fa-eye"></i> All Category</a>
  <a href="<?php echo base_url('admin/categories/add_subcategory/'.$cat_id) ?>" class="btn btn-info float-sm-right"><i class="fa fa-plus-square"></i> Add Sub Category</a>
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Sub Category List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Category Name</th>
            <th>Sub Category Name</th>
            <th>Status</th>
            <th>Created Datetime</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $counter=1; foreach($rows as $row): ?>
          <tr>
            <td><?php echo $counter++ ?></td>
            <td><?php echo ucwords($row->cat_name); ?></td>
            <td><?php echo ucwords($row->subcat_name); ?></td>
            <td>
              <?php if($row->status=='Active'): ?>
                <a href="javascript:void(0)" class="btn btn-success">Active</a>
              <?php else: ?>
                <a href="javascript:void(0)" class="btn btn-danger">In-active</a>
              <?php endif; ?>
            </td>
            <td><?php echo $row->created_datetime; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('admin/categories/edit_subcategory/'.$row->id.'/'.$cat_id) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/categories/delete_subcategory/'.$row->id.'/'.$cat_id) ?>" class="btn btn-danger btn-xs" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
<script type="text/javascript">
  function delFunc()
  {
    if(confirm('Do you want to delete?'))
      return true;
    else
      return false;
  }
</script>

