<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('superadmin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Settings List</li>
</ol>
<!-- Page Content -->
<h4>Settings List
  <!-- <a href="<?php echo base_url('superadmin/settings') ?>" class="btn btn-info float-sm-right"><i class="fa fa-plus-square"></i> Add Setting</a> -->
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Settings List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr style="font-size:0.9em">
            <th>Serial No.</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Map</th>
            <th>Logo</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr style="font-size:0.9em">
            <th>Serial No.</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Map</th>
            <th>Logo</th>
            <th>Actions</th>
          </tr>
        </tfoot>
        <tbody>
        <?php $counter=1; foreach($rows as $row): ?>
          <tr>
            <td><?php echo $counter++ ?></td>
            <td><?php echo $row->phone; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->map; ?></td>
            <td>
              <img src="<?php echo base_url('settings/'.$row->id.'.jpg') ?>" width="100">
            </td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('superadmin/settings/edit/'.$row->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('superadmin/settings/delete/'.$row->id) ?>" class="btn btn-danger" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
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

