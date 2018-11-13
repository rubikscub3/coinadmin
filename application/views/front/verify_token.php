<!--  page content -->
<div class="container content_area">
	<div class="page-header">
        <h1>Verify <span>(One Time Passcode)</span></h1>
	</div>
	<div class="row verify_sec">
	
        <div class="col-md-12 center-block">
			<img src="<?php echo base_url();?>assets/images/verify_code_icon.png" width="193" height="77" alt="">
			<h3>A One Time Passcode has been sent to your mobile # and Email ID.<br>
			Please enter the Code below to verify your email address & Mobile number.</h3>
			<h4>If you can’t receive the email from Excise Department & SMS on your mobile then please re-generate the PIN request after <?php echo $this->config->item('token_expire_time'); ?> minutes</h4>
		</div>
		
		<?php 
			$attributes = array('class' => 'token-form', 'id' => 'token-form');
			echo form_open(base_url().'Home/verify_token', $attributes);
		?>
		<div class="col-md-2 "></div>
		<div class="col-md-8">
            <div class="control-group form-group">
				<div class="controls  mrg_btm clearfix">
					<label class="col-md-4">Token: <span class="red">*</span></label>
					<?php
                  $token = array(
                      "name" => "token",
                      "id" => "token",
                      "class" => "col-md-8",
                      "placeholder" => "Please enter 4 digit token",
                      "required" => "required",
					  "autocomplete" => 'off'
                  );
                  echo form_input($token);
				  ?> 
				</div>
				<input type="hidden" name="token_type" id="token_type" value="register" />
                <?php if($this->session->flashdata('email')){?>
                  <input type="hidden" name="email" id="email" value="<?php echo $this->session->flashdata('email');?>" />
                <?php } ?>

                <?php if($this->session->flashdata('mobile')){?>
                  <input type="hidden" name="mobile" id="mobile" value="<?php echo $this->session->flashdata('mobile');?>" />
                <?php } ?>
				
				
				<div class="controls clearfix resend-msg-box">
					<label class="col-md-4"></label>
					<div class="resend-msg col-md-8"></div>
				</div>
				<div class="controls">
					<label  class="col-md-4"></label>
					<button type="submit" class="col-md-2 btn btn-primary">Verify</button>
					<p class="col-md-6 text-right"><a href="javascript:void(0);" id="resendOTP" class="resendOTP">Re-generate PIN</a></p>
				</div>
			</div>
		</div>
		<?php echo form_close();?>
		<div class="col-md-2 "></div>       
	</div>       
</form>
</div> 
</div>

<style>
	.resend-msg-box {
		display: none;
		margin-bottom: 5px;
	}
	.resend-msg {
		text-align: left;
		padding-left: 0px;
	}
</style>

<!-- JS for this page only -->
<script>
	var verify_path = "<?php echo base_url()?>home/verify_token";
	var base_url = "<?php echo base_url()?>";
</script>
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/verify_token.js"></script>