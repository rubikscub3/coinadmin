<!-- start: PAGE -->
            <div class="main-content">
             
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                          
                            <div class="page-header">
                                <h1>Beneficiary: Vehicle Details</h1>
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
                                    <strong> Vehicle Details: <?php echo $registration_no;?></strong>
									
                                    <hr>

                                    <div class="veh_detail">
                                    <h4>Vehicle Information</h4>
                                        <div class="row">
                                         
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Registration NO.</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det "><?php echo $vehicleData->_REGISTRATION_NO_;?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Owner Name</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_OWNER_NAME_;?></p>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Registration Date</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo (isset($vehicleData->_REGISTRATION_DATE_)) ? date("d-m-Y",strtotime($vehicleData->_REGISTRATION_DATE_)) : "N/A";?></p>
                                          </div>
                                        
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Last Tax Paid</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo (isset($vehicleData->_LAST_TAX_PAID_)) ? date("d-m-Y",strtotime($vehicleData->_LAST_TAX_PAID_)) : "N/A";?></p>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Make</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_MAKE_;?></p>
                                          </div>
                                       
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Engine NO.</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_ENGINE_NO_;?></p>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-2">
                                             <div class="veh_info_lable">Body Type</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_BODY_TYPE_;?></p>
                                          </div>
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Model Year</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_MODEL_YEAR_;?></p>
                                          </div>
                                        </div>
                                        <div class="row">
                                          
                                          <div class="col-sm-2">
                                             <div class="veh_info_lable">Seating Capacity</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_SEATING_CAPACITY_;?></p>
                                          </div>

                                          <div class="col-sm-2">
                                             <div class="veh_info_lable">Vehicle Category</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_VEHICLE_CATEGORY_;?></p>
                                          </div>

                                        </div>
                                        <div class="row">
                                          
                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">Engine Capacity</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_ENGINE_CAPACITY_;?></p>
                                          </div>

                                          <div class="col-sm-2">
                                            <div class="veh_info_lable">CPLC Status</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_CPLC_STATUS_;?></p>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-2">
                                             <div class="veh_info_lable">Safe Custody</div>
                                          </div>
                                          <div class="col-sm-4 pad_l">
                                            <p class="veh_info_det"><?php echo $vehicleData->_SAFE_CUSTODY_;?></p>
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
        