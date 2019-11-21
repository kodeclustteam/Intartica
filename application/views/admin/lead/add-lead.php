<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add New Lead</li>
</ol>
<!-- Page Content -->
<h4>Add New Lead
  <a href="<?php echo base_url('admin/leads') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
</h4>
<hr>
<div class="row">
  <!-- <div class="col-2"></div> -->
  <div class="col-12">
    <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#customer_details">Customer Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#requirements">Requirements</a>
    </li>
  </ul>
  <!-- Tab panes -->
<form action="<?php echo base_url('admin/leads/add_submit') ?>" method="post" enctype="multipart/form-data">
  <div class="tab-content">
    <div id="customer_details" class="container tab-pane active"><br>
      <h3>Customer Details</h3>
      <!-- Show instruction here -->
      <div class="row" id="instruction" style="width: 55%;font-style: italic;">
        <div class="col-sm-12 alert alert-success text-danger">
          Dear CRM Admin : Please add CSR to follow up with customer
        </div>
      </div>
      <!-- end here -->
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="status">Status :</label>
            <select name="status" class="form-control" id="status" required disabled>
              <option value="new" selected>New</option>
              <option value="pending_csr">Pending CSR</option>
              <option value="needs_quotation">Needs Quotation</option>
              <option value="disqualified_closed">Disqualified Closed</option>
              <option value="pending_pm">Pending PM</option>
              <option value="new_project">New Project</option>
            </select>
            <input type="hidden" name="status" id="hidden_status">
          </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group" style="margin-top: 14%;" id="buttons">
              <button class="btn btn-success changeStatus btn-sm" data-status="pending_csr" type="button">Pending CSR</button>
              <button class="btn btn-danger changeStatus btn-sm" data-status="disqualified_closed" type="button">Disqualified - Closed</button>
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="emp_id_with_crm_dept">Assign To CSR :</label>
            <select name="emp_id_with_crm_dept" class="form-control" id="emp_id_with_crm_dept">
              <option value="" disabled selected>Select Employee</option>
              <?php foreach($employees as $employee): ?>
                <option value="<?php echo $employee->id; ?>"><?php echo ucwords($employee->fname.' '.$employee->lname); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="emp_id_with_project_dept">Assign To Project Manager :</label>
            <select name="emp_id_with_project_dept" class="form-control" id="emp_id_with_project_dept">
              <option value="" disabled selected>Select Employee</option>
              <?php foreach($employees_with_project as $employee): ?>
                <option value="<?php echo $employee->id; ?>"><?php echo ucwords($employee->fname.' '.$employee->lname); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <!-- <br> -->
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="source">Source :</label>
            <select name="source" id="source" required class="form-control">
              <option value="" selected disabled>--Select Source--</option>
              <option value="web">Web</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="full_name">Customer Name :</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Customer Name" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="city">City :</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="mobile">Phone :</label>
            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Phone Number" required>
          </div>
        </div>
      </div>
    </div>
    <div id="requirements" class="container tab-pane fade"><br>
      <h3>Requirements</h3>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="bhk_select">House Type :</label>
            <select class="form-control" id="bhk_select" name="bhk_select" required>
              <option value="" selected disabled>--Select BHK--</option>
              <?php foreach($house_types as $house): ?>
                <option value="<?php echo $house->id ?>"><?php echo $house->house_type ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="budget">Project Budget :</label>
            <select class="form-control" id="budget" name="budget" required>
              <option  value="" selected disabled>--Select Budget--</option>
              <?php foreach($project_budgets as $project_budget): ?>
                <option value="<?php echo $project_budget->id ?>"><?php echo $project_budget->budget ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="addl_desc">Additional Details :</label>
            <input type="text" name="addl_desc" id="addl_desc" class="form-control" required placeholder="Enter More Details">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="quotes_image">Floor Plan (Optional) :</label>
            <input type="file" name="quotes_image" class="form-control">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="complete_date">Avaibility For Design :</label>
            <select class="form-control" id="complete_date" name="complete_date" required>
              <option value="" selected disabled>--Select One--</option>
              <option value="l_week" label="Within a Week">Within a Week</option>
              <option value="l_3_weeks" label="Within 1-3 Weeks">Within 1-3 Weeks</option>
              <option value="4_6_weeks" label="Within 4-6 Weeks">Within 4-6 Weeks</option>
              <option value="6_weeks" label="More than 6 Weeks">More than 6 Weeks</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="budget">Interior Items :</label>
            <button type="button" class="btn btn-primary btn-block font-weight-bold" data-toggle="collapse" data-target="#all_items">CLICK TO ADD ITEMS</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="all_items" class="collapse">
              <!-- item should be added here depend on house type -->
              <p class="alert alert-danger font-weight-bold">Please Select House Type.</p>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  </div>
  </div>
</form>
</div>
<!-- bootstrap modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Status</h4>
      </div>
      <div class="modal-body">
        <!-- content should be shown here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- ends here -->
<?php if($this->router->fetch_class()=='leads' && $this->router->fetch_method()=='add'): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#bhk_select').change(function(){
      var bhk_select = $(this).val();
      if(bhk_select != null)
      {
        $.ajax({
          url: "<?php echo base_url('admin/leads/fetch_furnished_items') ?>",
          data: {house_type_id:bhk_select},
          method: "POST",
          success: function(data){
            $('#all_items').html(data);
          },
          error: function(error){
            console.log(error);
          }
        });
      }
    });

    $(document).on('click','.changeStatus', function(){
      var statusValue = $(this).data('status');

      $.ajax({
        url: "<?php echo base_url('admin/leads/handle_status') ?>",
        data: {status:statusValue},
        dataType: "json",
        method:"POST",
        success: function(data)
        {
          if(data.buttons == 'no')
          {
            $('#buttons').parent().remove();
          }
          else
          {
            $('#buttons').html(data.buttons);
          }

          $('div#instruction > div.text-danger').html(data.instruction);
          $('#status').html(data.status);
          // console.log(data)
        },
        error: function(error){
          console.log(error);
        }
      });
    });

    // opening modal popup when status changed

    var old_status = $('#status').children("option:selected").text();
    $(document).on('click', '.changeStatus', function(){
      var new_status = $(this).text();
      old_status = $('#status').children("option:selected").text();
      var text = "Status is changed from <b>"+old_status+"</b> To <b>"+new_status+"</b>";
      $('.modal-body').html(text);
      $('#myModal').modal('show');
    });

    // required attribute for CSR and PM based on status
    $('#hidden_status').val($('#status').val());

    $(document).on('click', '.changeStatus', function(){
      setTimeout(function(){
        $('#hidden_status').val($('#status').val());
        if($('#status').val() == 'pending_csr')
          $('#emp_id_with_crm_dept').attr('required', true);
        else
          $('#emp_id_with_crm_dept').removeAttr('required');

        if($('#status').val() == 'pending_pm')
          $('#emp_id_with_project_dept').attr('required', true);
        else
          $('#emp_id_with_project_dept').removeAttr('required');
      }, 3000);
    });
  });
</script>
<?php endif ?>