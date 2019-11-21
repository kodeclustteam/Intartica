<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Admin List</li>
</ol>
<!-- Page Content -->
<h4>Admin List
   <a href="<?php echo base_url('superadmin/admins/add') ?>" class="btn btn-info btn-sm float-sm-right"><i class="fa fa-plus-square"></i> Add Admin</a>
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Admin List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr style="font-size:0.9em">
            <th>Serial No.</th>
            <th>Full Name</th>
            <th>Organization Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Roles</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr style="font-size:0.9em">
            <th>Serial No.</th>
            <th>Full Name</th>
            <th>Organization Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Roles</th>
            <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
        <?php $counter=1; foreach($rows as $row): ?>
          <tr>
            <td><?php echo $counter++ ?></td>
            <td><?php echo ucwords($row->fname.' '.$row->lname); ?></td>
            <td><?php echo ucwords($row->org_name); ?></td>
            <td><?php echo $row->email; ?></td>
            <td>
              <?php if($row->admin_status=='Active'): ?>
                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
              <?php else: ?>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm">In-active</a>
              <?php endif; ?>
            </td>
            <td><?php echo $row->roles; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('superadmin/admins/edit/'.$row->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('superadmin/admins/delete/'.$row->id) ?>" class="btn btn-danger btn-sm" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
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

