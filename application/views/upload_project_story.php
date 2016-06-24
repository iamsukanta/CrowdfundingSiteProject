<?php
$exception = $this->session->userdata('error');
if (isset($exception)) {
    echo $exception;
    $this->session->unset_userdata('error');
}
?>
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
        <form action="<?php echo base_url(); ?>project_uploader/save_project_story" method="post" enctype="multipart/form-data">
            <div class="upload_project_details_inner_sidebar_right">
                <h1 id="story_heading">Story</h1>
                <p>Tell potential contributors more about your campaign. Introduce yourself and provide details that will motivate people to contribute. A good pitch is compelling, informative, and easy to digest.</p>
               <!--  <p id="basics_text_tag">Pitch Video or Image</p>
                <label  class="custom-file-input">
                    <input type="file">
                </label> -->
                <p id="basics_text_tag_video_url">Vedio URL</p>
                <span>
                    <input type="text" name="video_url" placeholder="YouTube or Video " value=""/>
                </span>
                <!--<a href="#"><button class ="upload_project_details_inner_sidebar_right_video_button"><span>SAVE</span></button></a>-->



                <p id="basics_text_tag_campaign_card_image">Video Overlay Image</p>

                <a href="#"><div id="Campaign_card_image">
                        <p class="Campaign_card_image_button_text">GO</p></div></a>

                <!--<label  class="custom-file-input_video_image_button">-->
                <span id="video_overlay_image_upload_button">
                    <input type="file" name="video_overlay_image">
                </span>
                <!--</label>-->

                <p id="basics_text_tag_catagory">Your Campaign Pitch</p>

                <div id="What-you-see-what-you-get-section">
                    <!--<input type="text" name="campaign_pitch" value=" "/>-->
                    <span id="campaign_pitch"> <textarea name="campaign_pitch" id="ck_editor" rows="50" cols="80" > 
<h1>Short Summary</h1>

<h3>Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:</h3>
<ul>
<li>Introduce yourself and your background.</li>
<li>Briefly describe your campaign and why it's important to you.</li>
<li>Express the magnitude of what contributors will help you achieve.</li>
</ul>
Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?

<h1>What We Need & What You Get</h1>
<h3>Break it down for folks in more detail:</h3>
<ul>
<li>Explain how much funding you need and where it's going. Be transparent and specific-people need to trust you to want to fund you.</li>
<li>Tell people about your unique perks. Get them excited!</li>
<li>Describe where the funds go if you don't reach your entire goal.</li>
</ul>
<h1>The Impact</h1>
<h3>Feel free to explain more about your campaign and let people know the difference their contribution will make:</h3>
<ul>
<li>Explain why your project is valuable to the contributor and to the world.</li>
<li>Point out your successful track record with projects like this (if you have one).</li>
<li>Make it real for people and build trust.</li>
</ul>
<h1>Risks & Challenges</h1>
<h3>People value your transparency. Be open and stand out by providing insight into the risks and obstacles you may face on the way to achieving your goal.</h3>
<ul>
<li>Share what qualifies you to overcome these hurdles.</li>
<li>Describe your plan for solving these challenges.</li>
</ul>
<h1>Other Ways You Can Help</h1>
<h3>Some people just can't contribute, but that doesn't mean they can't help:</h3>
<ul>
<li>Ask folks to get the word out and make some noise about your campaign.</li>
<li>Remind them to use the Punji share tools!</li>
</ul>
And that's all there is to it.                        

                        </textarea>
                        <?php echo display_ckeditor($check_editor['ckeditor']); ?>
                    </span>
                </div>

            </div>
            <a href="#"><button class ="upload_project_details_button"><span>SAVE & CONTINUE</span></button></a>
        </form>


    </div>


</div>
<!-- upload project details ends -->