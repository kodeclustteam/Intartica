<section class="project-single">
	<div class="container">
	    <div class="row">
			<div class="col-md-6 project-details">	
                    <h2 style="text-transform: capitalize;">Project Details</h2>
                    <h4 class="project-title"></h4>

                <div class="project-description">
                    <!-- <h5>Client:</h5>
                    <p><?php echo ucwords($project_details[0]->cus_name) ?></p> -->
                    <h5 style="text-transform: capitalize;">Customer Name :</h5>
                    <p><?php echo $project_details[0]->cus_name ?></p>
                    <h5 style="text-transform: capitalize;">House Type:</h5>
                    <p><?php echo ucfirst($project_details[0]->house_type) ?></p>
                    <h5 style="text-transform: capitalize;">Apparment Name:</h5>
                    <p><?php echo $project_details[0]->apart_name ?></p> 
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
                    <div class="project_gallery">
                        <div class="col-sm-12">
                            <div class="project-image-placeholder">
                                <a data-effect="mfp-zoom-in" href="<?php echo base_url('projects-images/'.$project_details[0]->project_item_id.'.jpg') ?>">
                                    <img src="<?php echo base_url('projects-images/'.$project_details[0]->project_item_id.'.jpg') ?>" alt="Amazing Home Interior Design">

                                </a>
                            </div>
                        </div>
                        <?php foreach($project_details as $detail): ?>
                        <div class="col-sm-6">
                            <div class="project-image-placeholder">
                                <a data-effect="mfp-zoom-in" href="<?php echo base_url('projects-images/gallery/'.$detail->id.'.jpg') ?>">
                                    <img src="<?php echo base_url('projects-images/gallery/'.$detail->id.'.jpg') ?>" alt="Amazing Home Interior Design">
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>                              
                        <!-- <div class="col-sm-6">
                            <div class="project-image-placeholder">
                                <a data-effect="mfp-zoom-in" href="image/16.jpg">
                                    <img src="image/16.jpg" alt="Amazing Home Interior Design">
                                </a>
                            </div>
                        </div> -->     
                        <!-- <div class="col-sm-6">
                            <div class="project-image-placeholder">
                                <a data-effect="mfp-zoom-in" href="image/16.jpg">
                                    <img src="image/16.jpg" alt="Amazing Home Interior Design">
                                </a>
                            </div>
                        </div>  
                        <div class="col-sm-6">
                            <div class="project-image-placeholder">
                                <a data-effect="mfp-zoom-in" href="image/15.jpg">
                                    <img src="image/15.jpg" alt="Amazing Home Interior Design">
                                </a>
                            </div>
                        </div>  -->
                    </div>
				</div>
			</div>			
		</div>				
	</div>
</section>
