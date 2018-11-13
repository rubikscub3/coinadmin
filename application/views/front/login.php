<!--  page content -->
<div class="container content_area">
  <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
       
    <div class="icon-box">
			       
       <h2>CoinXchange</h2>
    </div>
    
    
    
      
      
      
      
      
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
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

          <h3>Login</h3>
          	<?php 
	          	$attributes = array('class' => 'login-form', 'id' => 'login-form');
      				echo form_open('Home', $attributes);
      			?>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <?php
                  $email = array(
                      "name" => "email",
                      "id" => "email",
                      "class" => "form-control",
                      "value" => set_value("email"),
                      "placeholder" => "Please enter your email address.",
                      "required" => "required",
                      "data-validation-required-message" => "Please enter your email address."
                  );
                  echo form_input($email);
                ?>
              </div>
              <?php if (!empty(form_error('email'))) { ?>
                  <label class="error"><?php echo form_error('email'); ?></label>
              <?php } ?>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Password:</label>
                <?php
                  $password = array(
                      "name" => "password",
                      "id" => "password",
                      "class" => "form-control",
                      "value" => set_value("password"),
                      "placeholder" => "*****",
                      "required" => "required",
                      "data-validation-required-message" => "Please enter your password",
					  "autocomplete" => 'off'
                  );
                  echo form_password($password);
                ?>
                <!--<input type="password" class="form-control">-->
              </div>
              <?php if (!empty(form_error('password'))) { ?>
                  <label class="error"><?php echo form_error('password'); ?></label>
              <?php } ?>
            </div>
            
            <div class="control-group form-group">
              <div class="controls">
              <p id="captImg"><?php echo $captchaImg; ?></p>
              <?php
                  $captchafield = array(
                      "name" => "captcha",
                      "id" => "captcha",
                      "class" => "form-control catpField1",
                      "placeholder" => "Enter Captcha Code",
                      "required" => "required",
					  "autocomplete" => 'off'
                  );
                  echo form_input($captchafield);
                ?>
              <!--<input type="text" class="form-control catpField1" name="captcha" placeholder="Enter Captcha Code">-->
              <input type="hidden" name="sessCaptcha" id="sessCaptcha" value="<?php echo $this->session->userdata('captchaCode');?>" />
              </div>
              <?php if (!empty(form_error('captcha'))) { ?>
                  <label class="error"><?php echo form_error('captcha'); ?></label>
              <?php } ?>
            </div>

            <div id="success"></div>
            <p>Can't read the image? click <strong class="link"><a href="javascript:void(0);" class="refreshCaptcha">here</a></strong> to refresh.</p>
            
            <button type="submit" class="btn def-btn">Login</button>
          
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  page content end -->

<!-- JS for this page only -->
<script>
	var login_path = "<?php echo base_url()?>home";
</script>

<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/login.js"></script>