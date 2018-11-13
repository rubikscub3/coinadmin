<!--  page content -->
<div class="container content_area">
  <div class="page-header">
    <h1>Create New Account</h1>
    <p>Please create an account that gives you access to the Excise Department online services. Your account will enable you to use online services such as Tax Payment,  Transfers, Mutation, Alteration, Verification, Registration etc.</p>
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
            echo form_open('Home/register', $attributes);
          ?>
  
            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>Full Name <span class="red">*</span></label>
                <?php
                  $username = array(
                      "name" => "username",
                      "id" => "username",
                      "class" => "form-control",
                      "value" => set_value("username"),
                      "placeholder" => "Please enter your username.",
                      "required" => "required",
                      "data-validation-required-message" => "Please enter your name."
                  );
                  echo form_input($username);
                ?>
              </div>
              <?php if (!empty(form_error('username'))) { ?>
                  <label class="error"><?php echo form_error('username'); ?></label>
              <?php } ?>
            </div>
            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>CNIC No. <span class="red">*</span></label>
                <?php
                  $cnic = array(
                      "name" => "cnic",
                      "id" => "cnic",
                      "class" => "form-control",
                      "value" => set_value("cnic"),
                      "placeholder" => "1111111111111",
                      "required" => "required",
                      "data-validation-required-message" => "Please enter your cnic.",
                  );
                  echo form_input($cnic);
                ?>
              </div>
              <?php if (!empty(form_error('cnic'))) { ?>
                  <label class="error"><?php echo form_error('cnic'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>

            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>NTN No. <span>(if available)</span></label>
                <?php
                  $ntn = array(
                      "name" => "ntn",
                      "id" => "ntn",
                      "class" => "form-control",
                      "value" => set_value("ntn"),
                      "placeholder" => "Please enter your ntn."
                  );
                  echo form_input($ntn);
                ?>
              </div>
              <?php if (!empty(form_error('ntn'))) { ?>
                  <label class="error"><?php echo form_error('ntn'); ?></label>
              <?php } ?>
            </div>
            
            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>Home / Office No.</label>
                <?php
                  $phone = array(
                      "name" => "phone",
                      "id" => "phone",
                      "class" => "form-control",
                      "value" => set_value("phone"),
                      "placeholder" => "Please enter Home / Office Phone No."
                  );
                  echo form_input($phone);
                ?>
              </div>
              <?php if (!empty(form_error('phone'))) { ?>
                  <label class="error"><?php echo form_error('phone'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>

            <div class="control-group form-group col-lg-6">
              <div class="controls">
                <label>Mobile No. <span class="red">*</span></label>
                <?php
                  $mobile = array(
                      "name" => "mobile",
                      "id" => "mobile",
                      "class" => "form-control",
                      "value" => set_value("mobile"),
                      "placeholder" => "03333333333",
                      "required" => "required",
                  );
                  echo form_input($mobile);
                ?>
              </div>
              <?php if (!empty(form_error('mobile'))) { ?>
                  <label class="error"><?php echo form_error('mobile'); ?></label>
              <?php } ?>
            </div>
            
            <div class="control-group form-group col-lg-6">
              <div class="controls">
                <label>City <span class="red">*</span></label>
                <?php
                $cities = $this->config->item('cities');
                $cities[''] = 'Please Select your city';
                echo form_dropdown('city',$cities, set_value('city'), 'id="city" class="form-control">');
                ?>
              </div>
              <?php if (!empty(form_error('city'))) { ?>
                  <label class="error"><?php echo form_error('city'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>
            
            <div class="control-group form-group col-md-12">
              <div class="controls">
                <label>Address <span class="red">*</span></label>
                <?php
                   $data = array(
                      'name'        => 'address',
                      'id'          => 'address',
                      'value'       => set_value('address'),
                      'rows'        => '3',
                      'class'       => 'form-control'
                  );
                  echo form_textarea($data);
                ?>
              </div>
              <?php if (!empty(form_error('address'))) { ?>
                  <label class="error"><?php echo form_error('address'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>

            <div class="control-group form-group col-lg-6">
              <div class="controls">
                <label>Email <span class="red">*</span></label>
                <?php
                  $email = array(
                      "type" => "email",
                      "name" => "email",
                      "id" => "email",
                      "class" => "form-control",
                      "value" => set_value("email"),
                      "placeholder" => "Please enter your email address.",
                      "required" => "required"
                  );
                  echo form_input($email);
                ?>
              </div>
              <?php if (!empty(form_error('email'))) { ?>
                  <label class="error"><?php echo form_error('email'); ?></label>
              <?php } ?>
            </div>
            
            <div class="control-group form-group col-md-6">
              <div class="controls">
                <label>Registration Entity Type  <span class="red">*</span></label>
                <?php
                $entity = $this->config->item('entity');
                echo form_dropdown('entity',$entity, set_value('city'), 'id="entity" class="form-control">');
                ?>
              </div>
              <?php if (!empty(form_error('entity'))) { ?>
                  <label class="error"><?php echo form_error('entity'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>
            
            <div class="control-group form-group col-lg-6">
              <div class="controls">
                <label>Password <span class="red">*</span></label>
                <?php
                  $password = array(
                      "name" => "password",
                      "id" => "password",
                      "class" => "form-control",
                      "value" => set_value("password"),
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
                      "value" => set_value("confirm_password"),
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

             <div class="control-group form-group col-md-6">
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
              <input type="hidden" name="sessCaptcha" value="<?php echo $this->session->userdata('captchaCode');?>" />
              </div>
              <?php if (!empty(form_error('captcha'))) { ?>
                  <label class="error"><?php echo form_error('captcha'); ?></label>
              <?php } ?>
            </div>
            <div class="clear"></div>

            <div class="control-group form-group col-md-12">
              <p><input name="terms" id="terms" type="checkbox" data-toggle="modal" data-target="#myModal" value="terms" required="required"> I agree to Excise Department 
              <strong class="link" data-toggle="modal" data-target="#myModal">Term of Service</strong>
              </p>
              <?php if (!empty(form_error('terms'))) { ?>
                  <label class="error"><?php echo form_error('terms'); ?></label>
              <?php } ?>

              <button type="reset" class="btn def-btn">Cancel</button>
              <button type="submit" class="btn def-btn">Register</button>
            </div>
            <div class="clear"></div>
     <?php echo form_close();?>
    </div>
    
    

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms and Conditions</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-danger">
  <p><strong> NOTE:</strong> Please Read the Following Terms and Conditions carefully. You may only proceed if these terms are acceptable to you.</p>

</div>
          
          
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn def-btn" id="termsreject">Do Not Accept</button>
          <button type="button" class="btn def-btn" id="termsaccept">Accept & Continue</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!--  page content end -->

<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>

<script>
  var register_path = "<?php echo base_url()?>home/register";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/register.js"></script>