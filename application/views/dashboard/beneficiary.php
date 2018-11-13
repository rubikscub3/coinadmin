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
                    
                        <div class="pull-right">
                        
                                <a class="btn def-btn" href="<?php echo base_url()?>Tax" >
                                    Generate OTPN
                                </a>
                            
                            </div>                  
                                        <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                     <div class="row">
                        <div class="col-md-12">
                            <!-- start: FORM VALIDATION 1 PANEL -->
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <div class="page-title">
                                      <h2>Add Beneficiary</h2>
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
                                    
                                    <hr>
                                    <?php 
                                        $attributes = array('class' => 'beneficiary-form', 'id' => 'beneficiary-form');
                                        echo form_open(base_url().'Beneficiary', $attributes);
                                    ?>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Vehicle Registration No. <span class="symbol required"></span>
                                                    </label>
                                                    <?php
                                                      $registration_no = array(
                                                          "name" => "registration_no",
                                                          "id" => "registration_no",
                                                          "class" => "form-control",
                                                          "value" => set_value("registration_no"),
                                                          "placeholder" => "Please enter Vehicle Registration NO.",
                                                          "required" => "required"
                                                      );
                                                      echo form_input($registration_no);
                                                    ?>
                                                    <?php if (!empty(form_error('registration_no'))) { ?>
                                                          <label class="error"><?php echo form_error('registration_no'); ?></label>
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Mobile No. <span class="symbol required"></span>
                                                    </label>
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
                                                  <?php if (!empty(form_error('mobile'))) { ?>
                                                      <label class="error"><?php echo form_error('mobile'); ?></label>
                                                  <?php } ?>
                                                </div>
                                              
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                      Nick Name<span class="symbol required"></span>
                                                    </label>
                                                    <?php
                                                      $nick_name = array(
                                                          "name" => "nick_name",
                                                          "id" => "nick_name",
                                                          "class" => "form-control",
                                                          "value" => set_value("nick_name"),
                                                          "placeholder" => "Please enter your nick name",
                                                          "required" => "required",
                                                      );
                                                      echo form_input($nick_name);
                                                    ?>
                                                    <?php if (!empty(form_error('nick_name'))) { ?>
                                                          <label class="error"><?php echo form_error('nick_name'); ?></label>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email <span class="symbol required"></span>
                                                    </label>
                                                    <?php
                                                      $email = array(
                                                          "name" => "email",
                                                          "id" => "email",
                                                          "class" => "form-control",
                                                          "value" => set_value("email"),
                                                          "placeholder" => "Please enter your Email address",
                                                          "required" => "required",
                                                      );
                                                      echo form_input($email);
                                                    ?>
                                                    <?php if (!empty(form_error('email'))) { ?>
                                                          <label class="error"><?php echo form_error('email'); ?></label>
                                                    <?php } ?>
                                                </div>
                                              
                                            </div>
                                            
                                        </div>
                                      
                                            
                                            <div class="pull-right">
                                                <button class="btn def-btn" type="submit"> Add </button>
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
			
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
			  <div class="modal-dialog modal-sm">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirm</h4>
					<p>Are you sure you want to delete this beneficiary?</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-danger" id="modal-btn-si">Delete</button>
					<button type="button" class="btn btn-default" id="modal-btn-no">No</button>
				  </div>
				</div>
			  </div>
			</div>
        </div>
        <!-- end: MAIN CONTAINER -->

<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>

<script>
  var beneficiary_path = "<?php echo base_url()?>Beneficiary";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/beneficiary.js"></script>