<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Images List</li>
</ol>
<!-- Page Content -->
<h4>Images List
  <a href="<?php echo base_url('superadmin/projects/add_images/'.$project_item_id) ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Images List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Photo Type</th>
            <th>Images</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Serial No.</th>
            <th>Photo Type</th>
            <th>Images</th>
            <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
        <?php $counter=1; foreach($images as $row): ?>
          <tr>
            <td><?php echo $counter++ ?></td>
            <td><?php echo ucfirst($row->photo_type); ?></td>
            <td>
              <img src="<?php echo base_url('projects-images/gallery/'.$row->id.'.jpg') ?>" width="100">
            </td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('superadmin/projects/edit_images/'.$row->id) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('superadmin/projects/delete_images/'.$row->id) ?>" class="btn btn-danger btn-xs" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
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

