<!-- start: PAGE -->
            <div class="main-content">
              
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                          
                            <div class="page-header">
                                <h1>Beneficiary</h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                        
                        
                        
                    </div>
                    
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                     <div class="row">
                        <div class="col-md-12">
                            <!-- start: FORM VALIDATION 1 PANEL -->
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <h2> Verify Beneficiary Token</h2>
                                    
                                    <?php if($this->session->flashdata('success')){?>
                                        <div class="alert alert-success alert-dismissible fade in">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong><?php echo $this->session->flashdata('success');?></strong>
                                        </div>
                                      <?php } ?>
                                    <hr>
                                    <?php 
                                        $attributes = array('class' => 'beneficiary-verify-form', 'id' => 'beneficiary-verify-form');
                                        echo form_open(base_url().'Beneficiary/verify_token', $attributes);
                                    ?>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Mobile OTP <span class="symbol required"></span>
                                                    </label>
                                                    <?php
                                                      $mobile_otp = array(
                                                          "name" => "mobile_otp",
                                                          "id" => "mobile_otp",
                                                          "class" => "form-control",
                                                          "value" => set_value("mobile_otp"),
                                                          "placeholder" => "0000",
                                                          "required" => "required",
														  "autocomplete" => 'off'
                                                      );
                                                      echo form_input($mobile_otp);
                                                    ?>
                                                    <?php if (!empty(form_error('mobile_otp'))) { ?>
                                                        <label class="error"><?php echo form_error('mobile_otp'); ?></label>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email OTP <span class="symbol required"></span>
                                                    </label>
                                                    <?php
                                                      $email_otp = array(
                                                          "name" => "email_otp",
                                                          "id" => "email_otp",
                                                          "class" => "form-control",
                                                          "value" => set_value("email_otp"),
                                                          "placeholder" => "0000",
                                                          "required" => "required",
														  "autocomplete" => 'off'
                                                      );
                                                      echo form_input($email_otp);
                                                    ?>
                                                    <?php if (!empty(form_error('email_otp'))) { ?>
                                                        <label class="error"><?php echo form_error('email_otp'); ?></label>
                                                    <?php } ?>
                                                </div>

                                                <?php if($this->session->flashdata('ben_email')){?>
                                                  <input type="hidden" name="ben_email" id="ben_email" value="<?php echo $this->session->flashdata('ben_email');?>" />
                                                <?php } ?>

                                                <?php if($this->session->flashdata('ben_mobile')){?>
                                                  <input type="hidden" name="ben_mobile" id="ben_mobile" value="<?php echo $this->session->flashdata('ben_mobile');?>" />
                                                <?php } ?>

                                                <?php if($this->session->flashdata('ben_nick_name')){?>
                                                  <input type="hidden" name="ben_nick_name" id="ben_nick_name" value="<?php echo $this->session->flashdata('ben_nick_name');?>" />
                                                <?php } ?>

                                                <?php if($this->session->flashdata('registration_no')){?>
                                                  <input type="hidden" name="registration_no" id="registration_no" value="<?php echo $this->session->flashdata('registration_no');?>" />
                                                <?php } ?>

                                                <p><strong class="link"><a href="javascript:void(0);" class="resendToken" id="resendToken">Re-send OTP</a></strong> </p>
                                              
                                            </div>
                                            
                                        </div>
                                        
                                           
                                            <div class="pull-right">
                                                <button class="btn def-btn" type="submit">
                                                    Add
                                                </button>
                                            </div>
                                        
                                    <?php echo form_close();?>
                                </div>
                            </div>
                            <!-- end: FORM VALIDATION 1 PANEL -->
                        </div>
                    </div>

                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        
<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>

<script>
  var beneficiary_path = "<?php echo base_url()?>Beneficiary";
  var beneficiary_verify_path = "<?php echo base_url()?>Beneficiary/verify_token";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/beneficiary_verify.js"></script>