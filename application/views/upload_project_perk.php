<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

<!--    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        -->    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/entrepreneur_upload_your_project_details_perk.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/country.js"></script> 
        <!--
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


                <a href="#"><button id="myAddPerkBtn"class ="upload_project_details_inner_sidebar_right_add_perk_button"><span>ADD PERK</span></button></a>
                <!-- Modal Pages add perk starts -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-content-inner">
                            <form action="<?php echo base_url(); ?>project_uploader/save_project_perk" method="post">
                                <span class="close">Close</span>
                                <h2>Perk Details</h2>
                                <p class="modal-content-inner-text-contribution-amount">Contribution Amount</p>

                                <input type="text" name="contribution_amount" class="perk_contribution_amount"  value="" placeholder="Taka"/>

                                <p class="modal-content-inner-text-perk-name">Perk Name</p>

                                <input type="text" name="perk_name" class="perk_contribution_amount1" value=""/>

                                <p>Perk Description</p>

                                <textarea name="perk_description" rows="6" cols="55"></textarea><br/> <br/>

                                <p class="number-content-inner-number-available-text"><br/>Number Available<span class="modal-page-optional-text">(Optional)</span></p>

                                <p class="number-content-inner-number-available-text1"><br/>Estimated Delivery Date<span class="modal-page-optional-text">(Optional)</span></p>



                                <input type="text" class="delivery-form" name="number_available" value="" placeholder="Number_available"/>
                                <input type="hidden" name="perk_type" value="1"/>

                                <select id="modal-page-estimated-delivery-month-select" name="month">
                                    <option value="select-month"> Month</option>
                                    <option value='01'>January</option>
                                    <option value='02'>February</option>
                                    <option value='03'>March</option>
                                    <option value='04'>April</option>

                                    <option value='05'>May</option>
                                    <option value='06'>June</option>
                                    <option value='07'>July</option>
                                    <option value='08'>August</option>
                                    <option value='09'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                                </select>

                                <select id="modal-page-estimated-delivery-year-select" name="year">
                                    <option value="select-month">Year</option>
                                    <option value='2016'>2016</option>
                                    <option value='2017'>2017</option>
                                    <option value='2018'>2018</option>
                                    <option value='2019'>2019</option>

                                    <option value='2020'>2020</option>
                                    <option value='2021'>2021</option>
                                    <option value='2022'>2022</option>
                                </select>

                                <p class="number-content-inner-number-available-text"><br/>Shipping Address Required<span class="modal-page-optional-text">(Optional)</span></p>

                                <!-- javascript Tab starts -->
                                <ul class="tab">
                                    <li><a href="#" class="tablinks" onclick="openTab(event, 'No')">No</a></li>
                                    <li><a href="#" class="tablinks" onclick="openTab(event, 'Yes')">Yes</a></li>
                                </ul>

                                <div id="Yes" class="tabcontent">
                                    <p><br/>Shipping Location(s)<p>
                                    <p class="modal-page-optional-text">Perks ships only to the following location.</p>
                                    <select id="modal-page-shipping-location-select" name="shipping_address">
                                        <!-- Script by hscripts.com -->
                                        <option value=" ">Select Country.......</option>
                                        <script type="text/javascript">
                                            printCountryOptions();
                                        </script>

                                    </select>

                                    <p><br/>Shipping Fee</p>
                                    <p class="modal-page-optional-text">Fee is added to the contribution amount.</p>

                                    <input type="text" name="shipping_fee" value="" placeholder="Taka"/>


                                </div>

                                <!-- javascript tab ends -->



                        </div>
                        <div id="modal-footer">

                        </div>
                        <a href="#"><button id="myAddPerkBtn"class ="modal_content_button_save"><span>SAVE</span></button></a>

                        <!--<a href="#"><button class ="modal_content_button_cancel"><span>CANCEL</span></button></a>-->


                    </div>
                    <!-- Modal Content ends -->
                </div>

                <!-- Modal pages add perk ends -->


                </form>
                <a href="<?php echo base_url(); ?>project_uploader/upload_project_secret_perk"><button id="myAddSecretPerkBtn"class ="upload_project_details_inner_sidebar_right_add_secret_perk_button"><span>ADD SECRET PERK</span></button></a>


                <p class="perk_inner_text">Perks are visible to everyone,  secret perks are <br/>only visible through a special link.</p>
<!--                        <p class="perk_inner_heading_text">You have not yet created any perks.</p>-->

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
                <!-- The Modal -->





            </div>
            <a href="<?php echo base_url(); ?>project_uploader/project_funding_account"><button class ="upload_project_details_button"><span>SAVE & CONTINUE</span></button></a>



        </div>


    </div>
    <!-- upload project details ends -->

    <script  src="<?php echo base_url(); ?>js/modal_pages.js" type="text/javascript"></script>
    <script  src="<?php echo base_url(); ?>js/modal-pages-tab.js" type="text/javascript"></script>

