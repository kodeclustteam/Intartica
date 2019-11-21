<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Category List</li>
</ol>
<!-- Page Content -->
<h4>Category List
  <a href="<?php echo base_url('admin/categories/import') ?>" class="btn btn-primary float-sm-right"><i class="fas fa-file-excel"></i> Import Excel</a>
  <a href="<?php echo base_url('admin/categories/add') ?>" class="btn btn-info float-sm-right"><i class="fa fa-plus-square"></i> Add Category</a>
</h4>
<hr>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Category List</div>
    <?php if($this->session->flashdata('error')): ?>
      <?php echo $this->session->flashdata('error'); ?>
    <?php endif; ?>
    <!-- for duplicate category -->
    <?php if($this->session->flashdata('cat_error')): ?>
      <?php echo $this->session->flashdata('cat_error'); ?>
    <?php endif; ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Category Name</th>
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
                <a href="<?php echo base_url('admin/categories/edit/'.$row->id) ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/categories/view_subcategory/'.$row->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                <a href="<?php echo base_url('admin/categories/delete/'.$row->id) ?>" class="btn btn-danger btn-xs" onclick="return delFunc()"><i class="fa fa-trash"></i> Delete</a>
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

<!-- <script type="text/javascript">
  function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>