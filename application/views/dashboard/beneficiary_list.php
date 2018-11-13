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
                            <!-- start: DYNAMIC TABLE PANEL -->
                            <div class="panel panel-default">

                              <div class="page-title">
                                <h2>Beneficiary Listing</h2>
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
                                
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Registration No</th>
                                                <th>Nickname</th>
                                                <th>Mobile No</th>
                                                <th>Email Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php if($ben_info){ 
													foreach($ben_info as $key => $value){
												?>
														<tr>
															<td><?php echo $value['registration_no'] ?></td>
															<td><?php echo $value['ben_nick_name'] ?></td>
															<td><?php echo $value['ben_mobile'] ?></td>
															<td><?php echo $value['ben_email'] ?></td>
															<td>
																<a href="<?php echo base_url()?>Beneficiary/vehicle_details/<?php echo $value['registration_no']?>"><button type="button" class="btn btn-dark-grey">Vehicle Details</button></a>
																<button type="button" data-id="<?php echo $value['ben_id'] ?>" class="btn btn-danger delete_ben">Delete</button>
															</td>
														</tr>
											<?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: DYNAMIC TABLE PANEL -->
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