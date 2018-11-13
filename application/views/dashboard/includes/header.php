<!DOCTYPE html>
<!-- Template Name: Excise, Taxation and Narcotics Control Department build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Excise, Taxation and Narcotics Control Department</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <script  src="<?php echo base_url();?>assets/admin/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/fonts/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/theme_dark.css" type="text/css" id="skin_color">-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/theme_navy.css" type="text/css" id="skin_color">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/print.css" type="text/css" media="print"/>
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/select2/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/DataTables/media/css/DT_bootstrap.css" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    
    
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
    
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header header-inner">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <div class="logo"><a class=" navbar-brand" href="<?php echo base_url();?>Dashboard">
                    <img src="<?php echo base_url();?>assets/admin/images/about-logo2.png"  alt="" class="img-responsive"> </a>
                    
                     <div class="tagLine">
		    <h1><a href="#">Excise, Taxation and Narcotics Control Department</a></h1>
		    <h4>Government Of Sindh</h4>
		
      
      </div>
                    
                    </div>
                    <!-- end: LOGO -->
                </div>
              
              <div class="header-right">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                       <li>
                        <!-- <img src="<?php echo base_url();?>assets/images/avatar-1-small.jpg" class="circle-img" alt="">-->
                        <span class="username">Welcome, <strong><?php echo $this->session->userdata('username');?></strong></span> </li>
                          &nbsp;  |
                         <li>
                                     <a href="<?php echo base_url()?>Dashboard/logout">
                                        <i class="clip-exit"></i>
                                        &nbsp;Log Out
                                    </a>
                                </li>
                            
                        <!-- end: USER DROPDOWN -->
                       
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
               </div>
               
               
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
                    <div class="navigation-toggler">
                        <i class="clip-chevron-left"></i>
                        <i class="clip-chevron-right"></i>
                    </div>
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU --> 
                    <?php
                        $dashboard = ($this->uri->segment(1) == "Dashboard" && empty($this->uri->segment(2)))?"active open":"";
                        $dashboard_select = ($this->uri->segment(1) == "Dashboard")?"selected":"";

                        $beneficiary = ($this->uri->segment(1) == "Beneficiary")?"active open":"";
                        $beneficiary_add = ($this->uri->segment(1) == "Beneficiary" && $this->uri->segment(2) != "beneficiary_list" && $this->uri->segment(2) != "vehicle_details")?"active open":"";
                        $beneficiary_list = ($this->uri->segment(2) == "beneficiary_list")?"active open":"";

                        $history = ($this->uri->segment(1) == "History")?"active open":"";
                        $history_select = ($this->uri->segment(1) == "History")?"selected":"";
						
						$tax_payment = ($this->uri->segment(1) == "Tax")?"active open":"";
                        $tax_banking = ($this->uri->segment(1) == "Tax" && $this->uri->segment(2) != "tax_online")?"active open":"";
						
						$profile = ($this->uri->segment(2) == "profile" || $this->uri->segment(2) == "view_profile")?"active open":"";
                        $view_profile = ($this->uri->segment(2) == "view_profile")?"active open":"";
                        $edit_profile = ($this->uri->segment(2) == "profile")?"active open":"";

                        $faq = ($this->uri->segment(1) == "Faq")?"active open":"";
                        $faq_select = ($this->uri->segment(1) == "Faq")?"selected":"";

                        $about = ($this->uri->segment(1) == "About")?"active open":"";
                        $about_select = ($this->uri->segment(1) == "About")?"selected":"";
                    ?>
                     <ul class="main-navigation-menu">
                     
                  

                        <li class="<?php echo $dashboard;?>"> <a href="<?php echo base_url()?>Dashboard"><i class="clip-home-3"></i> <span class="title"> Dashboard </span><span class="<?php echo $dashboard_select;?>"></span> </a> </li>
                        
 						 <li class="<?php echo $beneficiary;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> Beneficiary </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $beneficiary_add;?>">
                                    <a href="<?php echo base_url()?>Beneficiary">
                                        <span class="title"> Add Beneficiary </span>
                                    </a>
                                </li>
                                <li class="<?php echo $beneficiary_list;?>">
                                    <a href="<?php echo base_url()?>Beneficiary/beneficiary_list">
                                        <span class="title"> Beneficiary List </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="<?php echo $tax_payment;?>">
                            <a href="javascript:void(0)"><i class="fa fa-money"></i>
                                <span class="title"> Tax Payment </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $tax_banking;?>">
                                    <a href="<?php echo base_url()?>Tax">
                                        <span class="title"> Payment Via Banking Channel </span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        
                      <li class="<?php echo $history;?>"> <a href="<?php echo base_url()?>History"><i class="clip-history"></i>  <span class="title"> Tax Payment History </span><span class="<?php echo $history_select;?>"></span> </a> </li>
						
						<li class="<?php echo $profile;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> Profile Management </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $view_profile;?>">
                                    <a href="<?php echo base_url()?>Dashboard/view_profile">
                                        <span class="title"> View Profile </span>
                                    </a>
                                </li>
                                <li class="<?php echo $edit_profile;?>">
                                    <a href="<?php echo base_url()?>Dashboard/profile">
                                        <span class="title"> Edit Profile </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="<?php echo $profile;?>"> <a href="<?php echo base_url()?>Dashboard/profile"><i class="clip-user"></i>  <span class="title"> Profile Management </span><span class="<?php echo $profile_select;?>"></span> </a> </li>-->

                        <li class="<?php echo $about;?>"> <a href="<?php echo base_url()?>About"><i class="clip-info-2"></i>  <span class="title"> About Us </span><span class="<?php echo $about_select;?>"></span> </a> </li>

                        <li class="<?php echo $faq;?>"> <a href="<?php echo base_url()?>Faq"><i class="fa fa-question"></i>  <span class="title"> FAQ’s </span><span class="<?php echo $faq_select;?>"></span> </a> </li>

                        <li> <a href="<?php echo base_url()?>Dashboard/logout"><i class="clip-exit"></i>  <span class="title"> Logout </span><span class=""></span> </a> </li>

                      </ul>
                      
                      
                    
                </div>
                <!-- end: SIDEBAR -->
            </div>
            