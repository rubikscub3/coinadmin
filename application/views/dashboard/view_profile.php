<!-- start: PAGE -->
            <div class="main-content">
             
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                          
                            <div class="page-header">
                                <h1>View Profile</h1>
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
                                    
                                    <div class="veh_detail">
                                    <h4>Profile Information</h4>
                                        <div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Full Name </div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo ($user_info['username'] == "" ? " " : $user_info['username']) ?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">CNIC No.</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $user_info['cnic'] ?></p>
                                          </div>
                                        </div>
										
										<div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">NTN No. </div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo ($user_info['ntn'] == "" ? "&nbsp " : $user_info['ntn'] )?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Home/Office No.</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo ($user_info['phone'] == "" ? "&nbsp " : $user_info['phone']) ?></p>
                                          </div>
                                        </div>
										
										<div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Mobile No. </div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo $user_info['mobile'] ?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">City</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $user_info['city'] ?></p>
                                          </div>
                                        </div>
										<div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Address </div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo $user_info['address'] ?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Email</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $user_info['email'] ?></p>
                                          </div>
                                        </div>
										
										<div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Registration Entity Type </div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo $user_info['reg_entity'] ?></p>
                                          </div>
                                        </div>
                                        
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
        