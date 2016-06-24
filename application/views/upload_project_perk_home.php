<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

<!--    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        --> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/country.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/entrepreneur_upload_your_project_details_perk.css"><!--
            <script src="<?php echo base_url(); ?>js/jquery-1.7.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>js/jquery.jcarousel.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>js/functions.js" type="text/javascript"></script>
        -->

    </head>  
    <!-- upload project details starts -->
    <div id="upload_project_details">
        <h1><?php
            $project_title = $this->session->userdata('project_title');
            ?>
            &nbsp;<?php echo $project_title; ?></h1>
        <div class="upload_project_details_inner">
            <div class="upload_project_details_inner_sidebar_left">
                <ul>
                    <a href="<?php echo base_url(); ?>project_uploader/edit_project_basics"><li> 1. Basics</li></a>
                    <a href="<?php echo base_url(); ?>project_uploader/edit_project_story"><li> 2. Story</li></a>
                    <a href="<?php echo base_url(); ?>project_uploader/upload_project_perk_home"><li> 3. Perks</li></a>
                    <!-- <li>4.Team</li>-->
                    <!--<a href="#"><li> 4. Team</li></a>-->
                    <a href="<?php echo base_url(); ?>project_uploader/project_funding_account"><li> 4. Funding</li></a>


                </ul>
                <a href="#"><button class ="upload_project_details_inner_sidebar_left_button"><span>REVIEW AND LAUNCH</span></button></a>

                <a href="#"><button class ="upload_project_details_inner_sidebar_left_button"><span>VIEW CAMPAIGN</span></button></a>

                <a href="#"><button class ="upload_project_details_inner_sidebar_left_button"><span>SAVE</span></button></a>



            </div>
            <div class="upload_project_details_inner_sidebar_right">
                <h1 id="story_heading">Your Perks (Optional)</h1>
                <p>Perks are incentives offered to contributors in exchange for their support. You can edit a perk until it has been claimed by a contributor and you can show up to 20 perks at a time on your campaign page.</p>

                <?php echo $perk_maincontent; ?>

                <p class="perk_inner_text">Perks are visible to everyone,  secret perks are <br/>only visible through a special link.</p>


                <?php foreach ($project_perk as $value) {
                    ?>




                    <div id="adding_perk_page">




                        <p><b><?php echo $value->contribution_amount; ?> </b>+<?php
                            if ($value->shipping_address == '') {
                                echo 'no shipping';
                            } else {
                                echo 'shipping';
                            }
                            ?></p>
                        <h4><?php echo $value->perk_name; ?><!--Wristocat Single--></h4>
                        <p> <?php echo $value->perk_description; ?></p>
                        <p><b><?php echo $value->number_available; ?> Claimed</b></p>
                        <p><b>Estimated Delivery:</b><?php echo $value->month; ?> <?php echo $value->year; ?></p>
                        <p><b>Ships <?php echo $value->shipping_address; ?></b></p>
                        <p><b>Shipping fee <?php echo $value->shipping_fee; ?></b></p>     
                    </div>
                <?php } ?>



                <!-- The Modal -->





            </div>
            <a href="<?php echo base_url(); ?>project_uploader/project_funding_account"><button class ="upload_project_details_button"><span>SAVE & CONTINUE</span></button></a>



        </div>


    </div>
    <!-- upload project details ends -->

    <script  src="<?php echo base_url(); ?>js/modal_pages.js" type="text/javascript"></script>
    <script  src="<?php echo base_url(); ?>js/modal-pages-tab.js" type="text/javascript"></script>

