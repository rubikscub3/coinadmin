<!DOCTYPE html>
<!-- Template Name: Excise, Taxation and Narcotics Control Department build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>CoinXchange</title>
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
                    <div class="logo">
                     <div class="tagLine">
		    
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
						$beneficiary="";
						$beneficiary_list="";
						$beneficiary_add="";
                        $users = ($this->uri->segment(1) == "Users")?"active open":"";
                        $user_approval = ($this->uri->segment(1) == "Users" && $this->uri->segment(2) != "accepted_users" && $this->uri->segment(2) != "rejected_users")?"active open":"";
                        $user_accept = ($this->uri->segment(2) == "accepted_users")?"active open":"";
                        $user_reject = ($this->uri->segment(2) == "rejected_users")?"active open":"";

                    ?>
                     <ul class="main-navigation-menu">
                     
                  

                        <li class="<?php echo $dashboard;?>"> <a href="<?php echo base_url()?>Dashboard"><i class="clip-home-3"></i> <span class="title"> Dashboard </span><span class="<?php echo $dashboard_select;?>"></span> </a> </li>
                        
 						 <li class="<?php echo $users;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> Users </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
								<li class="<?php echo $user_approval;?>">
                                    <a href="<?php echo base_url()?>Users">
                                        <span class="title"> User Approval </span>
                                    </a>
                                </li>
                                <li class="<?php echo $user_accept;?>">
                                    <a href="<?php echo base_url()?>Users/accepted_users">
                                        <span class="title"> Accept </span>
                                    </a>
                                </li>
                                <li class="<?php echo $user_reject;?>">
                                    <a href="<?php echo base_url()?>Users/rejected_users">
                                        <span class="title"> Decline </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="<?php echo $beneficiary;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> Coins </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $beneficiary_add;?>">
                                    <a href="<?php echo base_url()?>Beneficiary">
                                        <span class="title"> Coins Request</span>
                                    </a>
                                </li>
                                <li class="<?php echo $beneficiary_list;?>">
                                    <a href="<?php echo base_url()?>Beneficiary/beneficiary_list">
                                        <span class="title">Accept</span>
                                    </a>
                                </li>
								<li class="<?php echo $beneficiary_list;?>">
                                    <a href="<?php echo base_url()?>Beneficiary/beneficiary_list">
                                        <span class="title">Reject</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="<?php echo $beneficiary;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> User Reports </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $beneficiary_add;?>">
                                    <a href="<?php echo base_url()?>Beneficiary">
                                        <span class="title"> Users</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="<?php echo $beneficiary;?>">
                            <a href="javascript:void(0)"><i class="clip-users-3"></i>
                                <span class="title"> System Settings </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?php echo $beneficiary_add;?>">
                                    <a href="<?php echo base_url()?>Beneficiary">
                                        <span class="title"> Add Beneficiary </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li> <a href="<?php echo base_url()?>Dashboard/logout"><i class="clip-exit"></i>  <span class="title"> Logout </span><span class=""></span> </a> </li>

                      </ul>
                      
                      
                    
                </div>
                <!-- end: SIDEBAR -->
            </div>
            