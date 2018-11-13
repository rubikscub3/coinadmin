<!--  page content -->
<div class="container content_area">
  <div class="row">
    <div class="col-lg-8">
      <div class="page-header">
        <h1>Online payments services</h1>
      </div>
      <div class="media mrg_btm">
        <div class="pull-left"> <img src="<?php echo base_url();?>assets/images/online_vehicle_icon.png" width="47" height="47" class="img_space" alt=""> </div>
        <div class="media-body">
          <h3> <a href="http://www.excise.gos.pk/vehicle/vehicle_search" target="_blank">Online Vehicle Verification</a></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="media mrg_btm">
        <div class="pull-left"> <img src="<?php echo base_url();?>assets/images/online_professional_icon.png" width="47" height="47" class="img_space" alt=""> </div>
        <div class="media-body">
          <h3> <a href="http://www.excise.gos.pk/tax_register/" target="_blank">Online Professional Tax</a></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="media mrg_btm">
        <div class="pull-left"> <img src="<?php echo base_url();?>assets/images/online_tax_sub_icon.png" width="47" height="47" class="img_space" alt=""> </div>
        <div class="media-body">
          <h3> <a href="#">Online Tax Submission</a></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
      <div class="media">
        <div class="pull-left"> <img src="<?php echo base_url();?>assets/images/online_tax_cal_icon.png" width="47" height="47" class="img_space" alt=""> </div>
        <div class="media-body">
          <h3><a href="http://excise.gos.pk/Tax-Calculator" target="_blank"> Online Tax Calculator</a></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="left_border">
        <div class="login_sec">

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

          <h3>Verify Token</h3>
          	<?php 
	          	$attributes = array('class' => 'token-form', 'id' => 'token-form');
      				echo form_open(base_url().'Home/verify_token_forgot', $attributes);
      			?>
            <div class="control-group form-group">
              <div class="controls">
                <label>Token:</label>
                <?php
                  $token = array(
                      "name" => "token",
                      "id" => "token",
                      "class" => "form-control",
                      "placeholder" => "Please enter 4 digit token",
                      "required" => "required",
					  "autocomplete" => 'off'
                  );
                  echo form_input($token);
                ?>
                <input type="hidden" name="token_type" id="token_type" value="forgot" />
                <?php if($this->session->flashdata('email')){?>
                  <input type="hidden" name="email" id="email" value="<?php echo $this->session->flashdata('email');?>" />
                <?php } ?>

                <?php if($this->session->flashdata('mobile')){?>
                  <input type="hidden" name="mobile" id="mobile" value="<?php echo $this->session->flashdata('mobile');?>" />
                <?php } ?>
              </div>
            </div>

            <p>Click <strong class="link"><a href="javascript:void(0);" class="resendOTP">here</a></strong> to resend OTP.</p>

            <button type="submit" class="btn btn-primary">Verify</button>

          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  page content end -->

<!-- JS for this page only -->
<script>
  var verify_path = "<?php echo base_url()?>home/verify_token";
</script>

<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/verify_token.js"></script>