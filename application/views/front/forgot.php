<!--  page content -->



<div class="container content_area">
  <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
       
    <div class="icon-box">
			       
       <h2>Online Payments Services</h2>
       
       <div class="row">
       		<div class="col-md-6 col-sm-6">
            	<div class="icon-box-inner">
           		 <img src="<?php echo base_url();?>assets/images/online_vehicle_icon.png" width="47" height="47" alt="" />
            	<h3><a href="http://www.excise.gos.pk/vehicle/vehicle_search" target="_blank">Online Vehicle Verification</a></h3>
            </div> 
            </div>
            
       		<div class="col-md-6 col-sm-6">
            <div class="icon-box-inner">
           		 <img src="<?php echo base_url();?>assets/images/online_professional_icon.png" width="47" height="47" alt="" />
            	<h3> <a href="http://www.excise.gos.pk/tax_register/" target="_blank">Online Professional Tax</a></h3>
            </div>
            </div> 
                  
       </div>
       
      
       
       <div class="row">
       		<div class="col-md-6 col-sm-6">
            	<div class="icon-box-inner">
           		 <img src="<?php echo base_url();?>assets/images/online_tax_sub_icon.png" width="47" height="47" class="img_space" alt=""> 
            	<h3><a href="#">Online Tax Submission</a></h3>
            </div> 
            </div>
            
       		<div class="col-md-6 col-sm-6">
            <div class="icon-box-inner">
           		 <img src="<?php echo base_url();?>assets/images/online_tax_cal_icon.png" width="47" height="47" alt="" />
            	<h3><a href="http://excise.gos.pk/Tax-Calculator" target="_blank"> Online Tax Calculator</a></h3>
            </div>
            </div>       
       </div>
       
       </div>
    
    
    
      
      
      
      
      
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div class="left_border">

        <div class="login_sec">

          <h3> FORGOT PASSWORD ?</h3>
          <p class="mrg_btm">Enter your registered Email and Mobile number below.
			You will be sent an SMS with details of how to reset your password</p>
			
			 <?php if($this->session->flashdata('failure')){?>
            <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $this->session->flashdata('failure');?></strong> 
            </div>
          <?php } ?>

          <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $this->session->flashdata('success');?></strong>
            </div>
          <?php } ?>
          

					
					<?php 
						$attributes = array('role' => 'form','id' => 'login-form');
						echo form_open(base_url().'home/forgot', $attributes);
					?>
					
						
						<div class="control-group form-group">
							<div class="controls">
								<label >Email: <span class="red">*</span></label>
								<input  class="form-control" type="text" name="email" id="email"  >
							</div>
                          </div>  
                            
                            <div class="control-group form-group">
							<div class="controls">
								<label  >Mobile No: <span class="red">*</span></label>
								<input  class="form-control" type="text" name="mobile_no" id="mobile_no"  >
							</div>
                            </div>
                            <div class="control-group form-group">
							<div class="controls">
								<label ></label>
								<a href="<?php echo base_url()?>home/" class="btn def-btn">Back to Login</a>
								<button type="submit" class="btn def-btn">Submit</button>
							</div>
                            </div>
						
						
					</div>
					<?php echo form_close();?>
					      
				</div>
          
        </div>
      </div>
    </div>
  </div>


<!--  page content end --> 
<!-- JS for this page only -->
<script>
	var forgot_path = "<?php echo base_url()?>home/forgot";
</script>
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>