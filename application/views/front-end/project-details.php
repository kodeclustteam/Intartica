<section class="section-header">
    <div class="container">
        <div class="row">
           <div class="col-sm-12 text-center">
               <h3><?php echo $category_name; ?></h3>                  
           </div>  
        </div> 
    </div>     
</section>
             
<div class="projects">
    <div class="container">
        <div class="row">            
            <!--<div class="col-sm-12 text-center">-->
            <!--    <ul id="projects-filter" style="padding-top: 0">-->
            <!--        <li><a href="#" data-filter="*" class="active">Show All</a></li>                  -->
            <!--        <li><a href="#" data-filter=".masterbedroom">Master Bedroom</a></li><li><a href="#" data-filter=".livingroom">Living Room</a></li><li><a href="#" data-filter=".kitchen">Modular Kitchen</a></li>                </ul>-->
            <!--</div>-->
        </div>
    </div>
	<div class="container-fluid">
		<div class="projects-grid">
			<div class="row" id="projects-grid">                
                <?php foreach($projects as $project): ?>
                    <div class="col-md-4 col-sm-6 project-item masterbedroom furniture wallpaper">
                        <article class="project-post">
                            <a href="<?php echo base_url('projects-details/'.$project->id) ?>" class="project-link">
                                <div class="project-overlay"></div>
                                <div class="project-hover">
                                    <h5 class="project-title">
                                        <?php echo strtoupper($project->photo_type); ?>
                                    </h5>
                                    <p class="project-category">
                                        <?php echo ucwords($project->apart_name); ?>
                                    </p>
                                </div>
                                <div class="image-placeholder">
                                        <img style="width: 100%;height: 455px;" src="<?php echo base_url('projects-images/'.$project->id.'.jpg') ?>" class="attachment-ptf-project-thumb size-ptf-project-thumb wp-post-image" alt="blog2" />
                                </div>
                            </a>
                        </article>
                    </div>
                <?php endforeach; ?>                
                                				
			</div>
		</div>
	</div>	        
</div>