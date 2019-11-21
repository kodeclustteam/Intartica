<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Subscriber List</li>
</ol>
<!-- Page Content -->
<h4>Subscriber List
   <!-- <a href="<?php echo base_url('admin/subscribers/add') ?>" class="btn btn-info float-sm-right"><i class="fa fa-plus-square"></i> Add Subscriber</a> -->
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Subscriber List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Email</th>
            <th>IP Address</th>
            <th>Created Datetime</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $counter=1; foreach($rows as $row): ?>
          <tr>
            <td><?php echo $counter++ ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->ip_address; ?></td>
            <td><?php echo $row->created_datetime; ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('admin/subscribers/edit/'.$row->id) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/subscribers/delete/'.$row->id) ?>" class="btn btn-danger btn-xs" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
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

