<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/entrepreneur_upload_your_project_details_story.css">
</head>
<div id="upload_project_details">
    <h1><h1><?php
            $project_title = $this->session->userdata('project_title');
            ?>
            &nbsp;<?php echo $project_title; ?></h1></h1>
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
        <form action="<?php echo base_url(); ?>project_uploader/update_project_story" method="post" enctype="multipart/form-data">
            <div class="upload_project_details_inner_sidebar_right">
                <h1 id="story_heading">Story</h1>
                <p>Tell potential contributors more about your campaign. Introduce yourself and provide details that will motivate people to contribute. A good pitch is compelling, informative, and easy to digest.</p>
               <!--  <p id="basics_text_tag">Pitch Video or Image</p>
                <label  class="custom-file-input">
                    <input type="file">
                </label> -->
                <p id="basics_text_tag_video_url">Vedio URL</p>
                <span>
                    <input type="text" name="video_url" placeholder="YouTube or Video " value="<?php echo $result->video_url; ?>"/>
                </span>
                <!--<a href="#"><button class ="upload_project_details_inner_sidebar_right_video_button"><span>SAVE</span></button></a>-->



                <p id="basics_text_tag_campaign_card_image">Video Overlay Image</p>

                <a href="#"><div id="Campaign_card_image">
                        <img src="<?php echo base_url(); ?><?php echo $result->video_overlay_image; ?>" alt=" " width="300px" height="200px"/>
                        <p class="Campaign_card_image_button_text">GO</p></div></a>

                <label  class="custom-file-input_video_image_button">
                <!--<span id="video_overlay_image_upload_button">-->
                    <input type="file" name="video_overlay_image" accept="<?php echo $result->video_overlay_image; ?>">
                    <!--</span>-->
                </label>

                <p id="basics_text_tag_catagory">Your Campaign Pitch</p>

                <div id="What-you-see-what-you-get-section">
                    <!--<input type="text" name="campaign_pitch" value=" "/>-->
                    <span id="campaign_pitch"> <textarea name="campaign_pitch" id="ck_editor1" rows="30" cols="82" > <?php echo $result->campaign_pitch; ?></textarea>
                        <?php echo display_ckeditor($check_editor['ckeditor1']); ?>

                    </span>
                </div>

            </div>
            <a href="#"><button class ="upload_project_details_button"><span>SAVE & CONTINUE</span></button></a>
        </form>


    </div>


</div>
<!-- upload project details ends -->