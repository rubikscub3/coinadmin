<!-- start: PAGE -->
            <div class="main-content">
               
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                          
                            <div class="page-header">
                                <h1>Profile Management</h1>
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
                                    <?php 
										$attributes = array('role' => 'form','id' => 'update-form');
										echo form_open(base_url().'Dashboard/profile', $attributes);
									?>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Username <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please enter your username" value="<?php echo $user_info['username'] ?>" class="form-control" id="username" name="username">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        NTN No. (if available) <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please enter your NTN" value="<?php echo $user_info['ntn'] ?>" class="form-control" id="ntn" name="ntn">
                                                </div>
												<div class="form-group">
                                                    <label class="control-label">
                                                        Mobile No. <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please Enter Mobile Number" class="form-control" value="<?php echo $user_info['mobile'] ?>" id="mobile" name="mobile">
                                                </div>
                                              
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                      CNIC No.<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please Enter CNIC" value="<?php echo $user_info['cnic'] ?>" class="form-control" id="cnic" name="cnic">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Home/Office No<span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please Enter Home/Office No" value="<?php echo $user_info['phone'] ?>" class="form-control" id="phone" name="phone">
                                                </div>
												
												<div class="form-group">
                                                    <label class="control-label">
                                                        City<span class="symbol required"></span>
                                                    </label>
                                                    <?php
														$cities = $this->config->item('cities');
														$cities[''] = 'Please Select your city';
														echo form_dropdown('city',$cities, $user_info['city'] , 'id="city" class="form-control">');
														?>
                                                </div>
                                              
                                            </div>
									        
                                        </div>
                                        <div class="row">
											<div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Address <span class="symbol required"></span>
                                                    </label>
                                                    <textarea name="address" cols="40" rows="3" id="address" class="form-control"><?php echo $user_info['address'] ?></textarea>
                                                </div>
                                            </div>
										</div>
										<div class="row">
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email <span class="symbol required"></span>
                                                    </label>
                                                    <input type="text" placeholder="Please Enter Email" class="form-control" value="<?php echo $user_info['email'] ?>" id="email" name="email">
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Registration Entity Type  <span class="symbol required"></span>
                                                    </label>
                                                    <?php
														$entity = $this->config->item('entity');
														echo form_dropdown('entity',$entity, $user_info['reg_entity'] , 'id="entity" class="form-control">');
													?>
                                                </div>
                                            </div>
										</div>
										
                                       
                                            
                                            <div class="pull-right">
                                                <button class="btn def-btn" type="submit">
                                                    Save
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
<!-- end : MAIN CONTAINER -->

<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/Inputmask-4.x/dist/jquery.inputmask.bundle.js" charset="utf-8"></script>

<script>
  var beneficiary_path = "<?php echo base_url()?>Beneficiary";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/profile.js"></script>