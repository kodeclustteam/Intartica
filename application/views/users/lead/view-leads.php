<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo base_url('users/dashboard'); ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">View Lead</li>
</ol>
<!-- Page Content -->
<h4>View Lead
  <a href="<?php echo base_url('users/leads') ?>" class="btn btn-info float-sm-right"><i class="fa fa-arrow-left"></i> Back</a>
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
<form action="<?php echo base_url('users/leads/edit_submit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
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
            <select name="status" class="form-control" id="status" required readonly>
              <option value="new" <?php if($row->status=='new')echo "selected"; ?>>New</option>
              <option value="pending_csr" <?php if($row->status=='pending_csr')echo "selected"; ?>>Pending CSR</option>
              <option value="needs_quotation" <?php if($row->status=='needs_quotation')echo "selected"; ?>>Needs Quotation</option>
              <option value="disqualified" <?php if($row->status=='disqualified')echo "selected"; ?>>Disqualified</option>
              <option value="closed">Closed</option>
              <option value="pending_pm" <?php if($row->status=='pending_pm')echo "selected"; ?>>Pending PM</option>
              <option value="new_project" <?php if($row->status=='new_project')echo "selected"; ?>>New Project</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
            <div class="btn-group" style="margin-top: 14%;" id="buttons">
              <button class="btn btn-success btn-sm changeStatus" data-status="pending_csr" type="button">Pending CSR</button>
              <button class="btn btn-danger btn-sm changeStatus" data-status="disqualified_closed" type="button">Disqualified - Closed</button>
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="emp_id_with_crm_dept">Assign To CSR :</label>
            <select name="emp_id_with_crm_dept" class="form-control" id="emp_id_with_crm_dept" disabled>
              <option value="" disabled selected>Select Employee</option>
              <?php foreach($employees as $employee): ?>
                <option value="<?php echo $employee->id; ?>" <?php if($row->emp_id_with_crm_dept==$employee->id)echo "selected"; ?>><?php echo ucwords($employee->fname.' '.$employee->lname); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="emp_id_with_project_dept">Assign To Project Manager :</label>
            <select name="emp_id_with_project_dept" class="form-control" id="emp_id_with_project_dept" disabled>
              <option value="" disabled selected>Select Employee</option>
              <?php foreach($employees_with_project as $employee): ?>
                <option value="<?php echo $employee->id; ?>" <?php if($row->emp_id_with_project_dept==$employee->id)echo "selected"; ?>><?php echo ucwords($employee->fname.' '.$employee->lname); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="source">Source :</label>
            <select name="source" id="source" required class="form-control" disabled>
              <option value="" selected disabled>--Select Source--</option>
              <option value="web" <?php if($row->source=='web')echo "selected"; ?>>Web</option>
              <option value="other" <?php if($row->source=='other')echo "selected"; ?>>Other</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="full_name">Customer Name :</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Customer Name" disabled required value="<?php echo $row->full_name ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required value="<?php echo $row->address ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="city">City :</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required value="<?php echo $row->city ?>" disabled>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required value="<?php echo $row->email ?>" disabled>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="mobile">Phone :</label>
            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter Phone Number" required value="<?php echo $row->mobile ?>" disabled>
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
            <select class="form-control" id="bhk_select" name="bhk_select" required disabled>
              <option value="" selected disabled>--Select BHK--</option>
              <?php foreach($house_types as $house): ?>
                <option value="<?php echo $house->id ?>" <?php if($row->house_type_id==$house->id)echo "selected"; ?>><?php echo $house->house_type ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="budget">Project Budget :</label>
            <select class="form-control" id="budget" name="budget" required disabled>
              <option  value="" selected disabled>--Select Budget--</option>
              <?php foreach($project_budgets as $project_budget): ?>
                <option value="<?php echo $project_budget->id ?>" <?php if($row->budget_id==$project_budget->id)echo "selected"; ?>><?php echo $project_budget->budget ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="addl_desc">Additional Details :</label>
            <input type="text" name="addl_desc" id="addl_desc" class="form-control" required placeholder="Enter More Details" value="<?php echo $row->addl_desc ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-4">
          <div class="form-group">
            <label for="quotes_image">Floor Plan (Optional) :</label>
            <input type="file" name="quotes_image" class="form-control">
          </div>
        </div> -->
        <div class="col-sm-8">
          <div class="form-group">
            <label for="complete_date">Avaibility For Design :</label>
            <select class="form-control" id="complete_date" name="complete_date" required disabled>
              <option value="" selected disabled>--Select One--</option>
              <option value="l_week" label="Within a Week" <?php if($row->complete_date=='l_week')echo "selected"; ?>>Within a Week</option>
              <option value="l_3_weeks" label="Within 1-3 Weeks" <?php if($row->complete_date=='l_3_weeks')echo "selected"; ?>>Within 1-3 Weeks</option>
              <option value="4_6_weeks" label="Within 4-6 Weeks" <?php if($row->complete_date=='4_6_weeks')echo "selected"; ?>>Within 4-6 Weeks</option>
              <option value="6_weeks" label="More than 6 Weeks" <?php if($row->complete_date=='6_weeks')echo "selected"; ?>>More than 6 Weeks</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="budget">Interior Items :</label>
            <button type="button" class="btn btn-primary btn-block font-weight-bold" data-toggle="collapse" data-target="#all_items">CLICK TO SEE ITEMS</button>
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
      <!-- <br>
      <div class="row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div> -->
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
<?php if($this->router->fetch_class()=='leads' && $this->router->fetch_method()=='view'): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    ajaxCall();

    $('#bhk_select').change(function(){
      ajaxCall();
    });

    // ajax call on page load
    function ajaxCall()
    {
      var bhk_select = $('#bhk_select').val();
      var item_id = <?php echo $row->id; ?>;
      if(bhk_select != null)
      {
        $.ajax({
          url: "<?php echo base_url('users/leads/fetch_furnished_items') ?>",
          data: {house_type_id:bhk_select,item_id:item_id},
          method: "POST",
          success: function(data){
            $('#all_items').html(data);
          },
          error: function(error){
            console.log(error);
          }
        });
      }
    }

    $(document).on('click','.changeStatus', function(){
      var statusValue = $(this).data('status');
      changeStatus(statusValue);
      // submit the form after three seconds
      setTimeout(function(){
            $('form').submit();
      }, 3000);
    });

    // calling on page load for status to be selected
    changeStatus($('#status').val());
    // ends here

    function changeStatus(statusValue)
    {
      $.ajax({
        url: "<?php echo base_url('users/leads/handle_status') ?>",
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
    }

    // opening modal popup when status changed

    var old_status = $('#status').children("option:selected").text();
    $(document).on('click', '.changeStatus', function(){
      var new_status = $(this).text();
      old_status = $('#status').children("option:selected").text();
      var text = "Status is changed from <b>"+old_status+"</b> To <b>"+new_status+"</b>";
      $('.modal-body').html(text);
      $('#myModal').modal('show');
    });

  });
</script>
<?php endif ?>