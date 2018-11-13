<!-- start: PAGE -->
            <div class="main-content">
              
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                          
                            <div class="page-header">
                                <h1>Dashboard</h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                        
                        
                        
                    </div>
                    
                        <div class="pull-right">
                        
                                <a class="btn def-btn" href="#" >
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

                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: DYNAMIC TABLE PANEL -->
                            <div class="panel panel-default">
                                
                            <div class="page-title">
                                <h2>Tax Payment History</h2>
                            </div>
                            
                            
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width table-no-action" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Registration No</th>
                                                <th>Amount Paid</th>
                                                <th>Transaction Date</th>
                                                <th>Payment Reference No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($history){
                                                foreach($history as $his){?>
                                                <tr>
                                                    <td><?php echo $his->_REGISTRATION_NO_;?></td>
                                                    <td><?php echo $his->_AMOUNT_PAID_;?></td>
                                                    <td><?php echo $his->_TRANSACTION_DATE_;?></td>
                                                    <td><?php echo $his->_PAYMENT_REFERENCE_NUMBER_;?></td>
                                                </tr>
                                            <?php } } else{?>
                                                <tr>
                                                    <td>No History...</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            <?php }?>
                                            
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
        </div>
        <!-- end: MAIN CONTAINER -->
        