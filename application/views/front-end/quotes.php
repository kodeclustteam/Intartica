<style>
.sidebar-menu-inner{
	
	background-image:url(<?php echo base_url('front-end/login-image/back4.jpg')?>);

}
.btn-next{
	background-color: khaki;
}

</style>
<div class="container-fluid" style="margin:50px;">

		<div class="row p-2">

				<div class="col-sm-3"></div>
					
				<div class="col-sm-6 " style=" border-style: solid;border-radius: 5px;
					border-color:#e6772e;">

						<div id="" lang="" dir="" class="">
							
							<div id="">
						
							<form id="project-create" class="" action="<?php echo base_url('quotes/quotes_submit') ?>" method="post" enctype="multipart/form-data">
							<input name="action" value="project_form_api" type="hidden">
							<input name="category" value="carpenter" type="hidden">
							<input name="step" value="first" type="hidden">
							<input name="proj_item" value="complete_interiors" type="hidden">
							<input name="next_step" value="carpenter-addl-details" type="hidden">
							
							<h3 style="text-align:center;background-color:#f39659;padding:12px 10px 16px 16px;font-size:15px;color:white;margin:-18px">
									Let's Get Started With Our Interior Solutions</h3>
							<div class="project-details proj-steps" style="color:black;">
							
							<div class="real-form">
							<div  class="no_desc" style="padding: 30px 10px 10px 3px;">
								
							<label class="" for="additional_items">House Type</label><br>
							
							<select id="bhk_select" name="bhk_select" required>
								<option style="display:none;" value="" label="Select BHK" selected disabled>Select BHK</option>
								<?php foreach($house_types as $house): ?>
				                <option value="<?php echo $house->id ?>"><?php echo $house->house_type ?></option>
				              	<?php endforeach; ?>
							</select>
							</div>
							
							<label class="" for="budget">What is your budget for this project?</label><br>
							<select id="budget"  name="budget" required>
								<option style="display:none;" value="" label="Select Budget" selected disabled>Select Budget</option>
								<?php foreach($project_budgets as $project_budget): ?>
				                <option value="<?php echo $project_budget->id ?>"><?php echo $project_budget->budget ?></option>
				              	<?php endforeach; ?>
							</select>
							</div>
							<label class="" for="additional_items">What items are you looking to furnish?</label><br>
						
							<button type="button" class="btn btn-secondary btn-lg" data-target="#demo" data-toggle="collapse">Click to add items</button>
							<div  id="demo" class="collapse">
							<!-- ajax items will come here on the basis of house type -->
							    <div class="btn-group">

								<button type="button" class="btn btn-dark"   value="Submit" data-target="#demo" data-toggle="collapse" >Submit</button>
				
								<button type="button" class="btn btn-dark"  data-target="#demo" data-toggle="collapse" value="Cancel">Cancel</button>
								</div>
							
							</div>
							<div style="margin-top:20px; " >
							<label class="projectLabel" for="additional_items">Do you have the floor plan for your property? (optional)</label>

							<!-- <script type="text/javascript" src="<?php echo base_url('front-end/api.filepicker.io/v1/filepicker.js') ?>"></script> -->

							<span class="ui-band" id="upload_main_file">
							
							<input type="file" class="text-center" name="quotes_image"> 
							<i class="icon icon-upload fa fa-upload"></i>
							 Upload Floor Plan or Measurements
							</span>
							<input style="display:none;" name="design_images" data-fp-button-text="Upload Floor Plan or Measurements" data-fp-button-class="add-designs" type="filepicker" data-fp-apikey="AFW3EDtuTxKRF8n6AmEtoz" data-fp-mimetypes="*/*" data-fp-container="modal" data-fp-multiple="true" data-fp-services="COMPUTER,DROPBOX,FACEBOOK,GOOGLE_DRIVE,INSTAGRAM,IMAGE_SEARCH,URL" onchange="myfilepicker(event);">
							<!-- Now setup your input fields -->
							<div id="file_picker_files"></div>
							</select>
							</div>
							<div>
							<label class="projectLabel" for="complete_date">By when will the site be ready for interiors?</label><br>
							<select class="projectInput" id="complete_date" name="complete_date" required>
							<option style="display:none;" value="default" label="Select one" selected="selected">Select one</option>
							<option value="l_week" label="Within a Week">Within a Week</option>
							<option value="l_3_weeks" label="Within 1-3 Weeks">Within 1-3 Weeks</option>
							<option value="4_6_weeks" label="Within 4-6 Weeks">Within 4-6 Weeks</option>
							<option value="6_weeks" label="More than 6 Weeks">More than 6 Weeks</option>
							</select>
							</div>
							</div>
							</div>
							<br>
							<div class="submit-btn text-center" style="margin: 20px;color:black;border-radius:10px;">
								<button type="submit" class="btn btn-next"  value="NEXT" name="NEXT">NEXT</button>
								<input type="reset" name="" value="Reset All" class="btn btn-grey">
							</div>
							</form>
							</div>		
				</div>
				
				<div class="col-sm-3"></div>
			  </div>
</div>
<?php if($this->router->fetch_class()=='quotes' && $this->router->fetch_method()=='index'): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#bhk_select').change(function(){
			var bhk_select = $(this).val();
			if(bhk_select != null)
			{
				$.ajax({
					url: "<?php echo base_url('quotes/fetch_items') ?>",
					data: {house_type:bhk_select},
					method: "POST",
					success: function(data){
						$('#demo').html(data);
					},
					error: function(error){
						console.log(error);
					}
				});
			}
		});
	});
</script>
<?php endif ?>
