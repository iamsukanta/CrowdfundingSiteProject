<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/campaign-description-page.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/enterpreneur_upload_your_project.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/entrepreneur_upload_your_project_details.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/start_your_project.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/profile_menu.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/update_profile_and_settings.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/profile.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jcarousel_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jcarousel.connected-carousels.css">
        <script type="text/javascript" src="<?php echo base_url() ?>js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jsval.js"></script>
        <script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery-1.7.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jcarousel.connected-carousels.js"></script>
        <script typ="text/javascript" src="<?php echo base_url(); ?>js/functions.js"></script>
        <script type="text/javascript">
            function checkDelete() {
                var chk = confirm("are u sure to delete")
                if (chk) {
                    return true;
                } else
                {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <!--body content starts  -->
        <div id="body_content">
            <!-- container starts -->
            <div id="container">
                <!-- notification bar starts -->
                <div id="notification_bar">
                    <ul>
                        <li id="logo"> <a href="<?php echo base_url(); ?>welcome/index">Punji</a></li>
                        <li><a href= "<?php echo base_url(); ?>welcome/start_project">Start Your Project</a></li>
                        <li> <a href="<?php echo base_url(); ?>welcome/explore_category">Explore Categories</a></li>
                        <li><a href="#">Support a cause</a></li>
                        <li><form action="<?php echo base_url(); ?>search/search_project" method="get"><input class="search" type="text" name="search" placeholder="search project"/></form></li>
                        <?php
                        $user_id = $this->session->userdata('user_id');
                        if ($user_id != null) {
                            $full_name = $this->session->userdata('full_name');
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $full_name; ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Contributions</a></li>
                                    <li><a href="<?php echo base_url(); ?>uploader/my_campaigns"> My Campaigns </a> </li>
                                    <li><a href="<?php echo base_url() ?>uploader/my_profile">My Profile</a></li>
                                    <li><a href="<?php echo base_url() ?>uploader/my_settings">My Settings</a></li>
                                    <li><a href="<?php echo base_url(); ?>welcome/logout">Log Out</a></li>
                                </ul>
                            </li>

                        <?php } else { ?>
                            <li id="log_in"><a class="btn-1" href="<?php echo base_url(); ?>welcome/user_login">Log In</a></li>
                            <li id="sign_up"><a class="btn-1" href="<?php echo base_url(); ?>welcome/sign_up">Sign Up</a></li>
                        <?php } ?>
                    </ul>   
                </div>  
                <!-- notification bar ends -->



                <?php echo $maincontent; ?>

                <!-- Footer starts -->
                <div id="footer">

                    <!-- footer_left starts -->
                    <div class="footer_panel" id="footer_left">
                        <ul>
                            <li class="header_menu">About Punji</li>
                            <li class="under_menu">What is Punji.com</li>
                            <li>History</li>
                            <li>Goal and Objective</li>
                            <li>Start to GetFundingbd</li>
                            <li>Where we are</li>
                            <li>Highlights</li>
                        </ul>

                    </div>
                    <!-- footer_left ends -->

                    <!-- footer_left_one starts-->
                    <div class="footer_panel" id="footer_mid">
                        <ul>
                            <li class="header_menu">How it Works</li>
                            <li class="under_menu">For Entrepreneur</li>
                            <li>For Investor</li>
                            <li>For Helper</li>
                            <li>Start Your Project</li>
                            <li>Start Your Funding</li>
                            <li>Raise Your Hand</li>
                        </ul>

                    </div>
                    <!-- footer_left_one ends -->

                    <!-- footer_left_two starts-->
                    <div class="footer_panel" id="footer_right">
                        <ul>
                            <li class="header_menu">Help For You</li>
                            <li class="under_menu">FAQ</li>
                            <li>Our Rules and Regulation</li>
                            <li>Trust and Safety</li>
                            <li>Privacy Policy</li>
                            <li>Contact Us</li>
                            <li>Form</li>
                        </ul>

                    </div>
                    <!-- footer_left_two ends -->

                    <!-- footer_right starts-->
                    <div class="footer_panel" id="footer_social">
                        <ul>
                            <li class="header_menu">Find Us</li>
                            <li class="social_icon"><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li class="social_icon"><a href="https://www.twitter.com"><i class="fa fa-twitter"></a></i></li>
                            <li class="social_icon"><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></a></i></li>
                            <li class="social_icon"><a href="https://www.googleplus.com"><i class="fa fa-google-plus"></a></i></li>
                            <li class="social_icon"><a href="https://www.youtube.com"><i class="fa fa-youtube"></a></i></li>
                        </ul>

                    </div>
                    <!-- footer_right ends -->
                </div>
                <!-- Footer ends -->

                <!-- Copyright Starts -->
                <div id="copyright">
                    <p id="copyright_text">&copy All Rights Reserved Punji.com</p>               
                </div>
                <!-- Copyright ends -->



            </div>
            <!-- container end -->
        </div>
        <!--body container ends  -->
    </body>
</html>

