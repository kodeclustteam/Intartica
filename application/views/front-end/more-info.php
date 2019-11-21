<style>
.sidebar-menu-inner{
    
     background-image:url(<?php echo base_url('front-end/login-image/back4.jpg')?>);
}
</style>

<div class="container" style="margin: 50px;">
    <div class="row">

        <div class="col-sm-4"></div>
        <div class="col-sm-4" style=" border-style: solid;border-radius: 5px;
                    border-color:#e6772e;">


                <form id="" class="" action="<?php echo base_url('quotes/more_info_submit') ?>" method="POST">

                        <input name="action" value="project_form_api" type="hidden">
                        <input name="category" value="carpenter" type="hidden">
                        <input name="step" value="carpenter-addl-details" type="hidden">
                        <input name="next_step" value="details" type="hidden">
                        <input name="project_id" value="5d525a0f34618" type="hidden">
                
                        <div class="addl-details proj-steps">
                            <h5 style="text-align:center;background-color:#f39659;padding:12px 10px 16px 16px;font-size:15px;color:white;margin:-18px">
                                Help us match the right experts for you</h5>
                            <div class="real-form" style="color:black;">
                          
                                <div>
                                    <label class="" for="addl_desc"  style="padding: 30px 10px 10px 3px;">Additional Details</label><br>
                                    <textarea class="projectInput" id="addl_desc" name="addl_desc" rows="5" cols="50" placeholder="Add specific requirements if any related to designing, materials, accessories, etc" required></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="submit-btn text-center">
                            <button type="submit" class="btn btn-secondary" value="NEXT" name="NEXT" style="color:black;">NEXT</button>
                        </div>
                        <br>
                    </form>

        </div>
        <div class="col-sm-4"></div>
    </div>
 </div>