<!--  page content -->
<div class="container content_area">
  <div class="page-header">
    <h1>Change Password</h1>
    <p>If you already have an  account please <strong class="link"><a href="<?php echo base_url();?>">Click Here</a></strong> to Sign In</p>
  </div>

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

      <div class="row">
          <?php 
            $attributes = array('class' => 'register-form', 'id' => 'register-form');
            echo form_open('Home/reset_password', $attributes);
          ?>
            <?php if($this->session->flashdata('email')){?>
                  <input type="hidden" name="email" id="email" value="<?php echo $this->session->flashdata('email');?>" />
                <?php } ?>

                <?php if($this->session->flashdata('mobile')){?>
                  <input type="hidden" name="mobile" id="mobile" value="<?php echo $this->session->flashdata('mobile');?>" />
                <?php } ?>
			<div class="control-group form-group col-lg-6">
              <div class="controls">
                <label>Password <span class="red">*</span></label>
                <?php
                  $password = array(
                      "name" => "password",
                      "id" => "password",
                      "class" => "form-control",
                      "value" => '',
                      "placeholder" => "*****",
                      "required" => "required",
                      "data-validation-required-message" => "Please enter your password"
                  );
                  echo form_password($password);
                ?>
              </div>
              <?php if (!empty(form_error('password'))) { ?>
                  <label class="error"><?php echo form_error('password'); ?></label>
              <?php } ?>
            </div>
            
            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>Re-type Your Password <span class="red">*</span></label>
                <?php
                  $confirm_password = array(
                      "name" => "confirm_password",
                      "id" => "confirm_password",
                      "class" => "form-control",
                      "value" => '',
                      "placeholder" => "*****",
                      "required" => "required"
                  );
                  echo form_password($confirm_password);
                ?>
              </div>
              <?php if (!empty(form_error('confirm_password'))) { ?>
                  <label class="error"><?php echo form_error('confirm_password'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>

            <div class="control-group form-group col-md-12">
              <button type="reset" class="btn btn-gray">Cancel</button>
              <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
            <div class="clear"></div>
     <?php echo form_close();?>
    </div>
  
</div>

<!--  page content end -->

<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>

<script>
  var register_path = "<?php echo base_url()?>home/register";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/reset_password.js"></script>