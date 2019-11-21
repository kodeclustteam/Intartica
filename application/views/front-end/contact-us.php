<div id="aq-template-wrapper-91" class="aq-template-wrapper aq_row">
<!-- Section Start -->
<div id="contact-map" class="clearfix standard" style="background-color:#ffffff;   padding-bottom:0; padding-top:60px;"  >
<div class="container">
	<div class="row">        
	<div class="clearfix section-header" style="padding-bottom:60px; " >
     <div class="col-sm-12 text-center">
         <h3 style="color:#3e3e3e;">Get in Touch!</h3>
         <?php echo $setting->map; ?>
      </div>        
 </div>
</div>
</div>
</div>	
<div id="contact-form" class="clearfix standard" style="background-color:#ffffff;   padding-bottom:60px; padding-top:60px;"  >
    <div class="container">
        <div class="row">
            <div id="aq-block-91-6" class="aq-block aq-block-ptf_text_block aq_span4 aq-first clearfix">
                <h4 class="contact-heading">Head offices</h4>
    
                <h5>Phone:<?php echo $setting->phone; ?></h5>
                <h6><?php echo $setting->email; ?></h6>
                <p>#7-1/52&53, PBNR Plaza 5th floor,
                    Nallagandla, Serlingampally Above kitsons,
                    Nallagandla, Hyderabad Telangana 500019</p>
            </div>
            <div id="aq-block-91-7" class="aq-block aq-block-ptf_text_block aq_span8  clearfix">
                <h4 class="contact-heading">Send us a Message</h4>
                <div role="form" class="wpcf7" id="wpcf7-f7-p64-o1" lang="en-US" dir="ltr">
                    <?php if($this->session->flashdata('error')): ?>
                        <?php echo $this->session->flashdata('error'); ?>
                    <?php endif; ?>
                    <div class="screen-reader-response"></div>
                    <form action="<?php echo base_url('contact-submit') ?>" method="post">
                        <!-- <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="7" /><br />
                            <input type="hidden" name="_wpcf7_version" value="4.5.1" /><br />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" /><br />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f7-p64-o1" /><br />
                            <input type="hidden" name="_wpnonce" value="589b4ac04b" />
                        </div> -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <span class="wpcf7-form-control-wrap name">
    
                                            <input type="text" name="name" placeholder="Name" required /></span>
                                    </div>
    
                                    <div class="col-md-4 col-sm-12">
                                        <span class="wpcf7-form-control-wrap email">
                                            <input type="email" name="email" 
                                                placeholder="Email Address" required /></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <span class="wpcf7-form-control-wrap">
                                            <input type="text" name="phone" placeholder="Phone" required /></span>
                                    </div>
    
    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <span class="wpcf7-form-control-wrap message"><textarea name="message" cols="40" rows="1" placeholder="Message" required></textarea></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="submit" value="Send Message"
                                            class="wpcf7-submit btn btn-accent" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section End -->
</div>