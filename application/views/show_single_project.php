<div id="searching_category_page">
    <br/>
    <br/>

    <h1><?php echo $single_project->project_title; ?></h1>
    <br/>
    <p class="centered-text"><b>Location:</b><?php echo $single_project->city; ?>,<?php echo $single_project->country; ?>. <b>Category Name:</b><?php echo $single_project->category_name; ?>.</p>
    <br/><br/><br/><br/>
    <div class="searching_category_page_inner">
        <ul>
            <a href="#"><li>Story</li></a>
            <a href="#"><li>Updates</li></a>
            <a href="#"><li>Comments</li></a>
            <a href="#"><li>Backers</li></a>
            <a href="#"><li>Gallery</li></a>
        </ul>
    </div>
    <br/>
    <div id="campaign-description-left-side">
        <ul>
            <li class="header_menu">Find This Campaign</li>
            <li class="facebook"><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>

            <li class="twitter"><a href="https://www.twitter.com"><i class="fa fa-twitter"></a></i></li>

            <li class="envelope"><a href="https://www.envelop.com"><i class="fa fa-envelope"></a></i></li>


            <li class="linked_in"><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></a></i></li>

            <li class="google_plus"><a href="https://www.googleplus.com"><i class="fa fa-google-plus"></a></i></li>


            <li class="you_tube"><a href="https://www.youtube.com"><i class="fa fa-youtube"></a></i></li>
        </ul>

    </div>
    <div id="campaign-description-middle-side">
        <div class="campaign-description-middle-side_inner">
            <img src="<?php echo base_url(); ?><?php echo $single_project->card_image; ?>" width="700px" height="350px" alt="card image"/>
            <h2><?php echo $single_project->tagline; ?></h2>
            <br/><?php echo $single_project->tags; ?>
            <br/>
        </div>
        <div class="campaign-description-middle-side-personal-details">
            <div class="campaign-description-middle-side-personal-image">
                <img src="<?php echo base_url(); ?><?php echo $single_project->profile_image; ?>" height="120px" alt="campaigner.jpg image">

            </div>
            <div class="campaign-description-middle-side-personal-description">
                <b><?php echo $single_project->first_name; ?> &nbsp;<?php echo $single_project->last_name; ?></b><br/><br/>
                Identity Verified<br/>
                Email Verified<br/>
                1200 facebook friends<br/>

            </div>
            <div class="campaign-description-middle-side-category-image">
                <img src="<?php echo base_url(); ?><?php echo $single_project->category_image; ?>" width="120px" height="120px" alt="profile_image">

            </div>
            <div class="campaign-description-middle-side-category-description">
                <b><?php echo $single_project->category_name; ?></b><br/><br/>
                <?php echo $single_project->city; ?><br/>
                <?php echo $single_project->country; ?><br/>
                4 team members<br/><br/>
                <b>Contact <br/> See more details</b>

            </div>
        </div>
        <br/>
        <div class="campaign-description-middle-side_inner-content-2">
            <h2>About this project</h2>
            <br/><br/>
            <p class="campaign-description-middle-side_inner-content-2-text">
                <img src="<?php echo base_url(); ?><?php echo $single_project->video_overlay_image; ?>" width="700px" height="200px" alt="campaing.jpg image"/>
                <?php echo $single_project->campaign_pitch; ?>
            </p>

            <a href="#Select_Park"><button class ="campaign-description-middle-side_inner-content-2-contribute-button"><span>Contribute Now</span></button></a>

            <br/><br/><br/>


        </div>
        <a href="#"><button class ="campaign-description-middle-side_inner-content-2-button"><span>Ask a question</span></button></a>
        <br/><br/>

        <a href="#"><button class ="campaign-description-middle-side_inner-content-2-button2"><span>Report this project to Punji</span></button></a>
    </div>
    <div id="campaign-description-right-side">
        <div class="campaign-description-right-side-project-details">
            <p class="campaign-description-right-side-header-text"><b>৳<?php echo $single_project->demand; ?></b></p>
            --------------<br/>
            131% of ৳4550440<br/>
            98 backers<br/>
            <?php echo $single_project->deadline; ?> days left
        </div>
        <br/>
        <h1 id="Select_Park">Select a Perk</h1>
        <br/>
        <?php
        foreach ($project_perk as $vperk) {
            $perk_id = $vperk->perk_id;
            ?>
            <a href="<?php echo base_url() . "project_contribute/single_project_contribute/" . $single_project->project_id . "/" . $perk_id; ?>">
                <div class="campaign-description-right-side-project-details">
                    <p><span class="campaign-description-right-side-header-text"><b>৳<?php echo $vperk->contribution_amount; ?></b></span>+<?php
                        if ($vperk->shipping_address == '') {
                            echo 'no shipping';
                        } else {
                            echo 'shipping';
                        }
                        ?></p>
                    <h4><?php echo $vperk->perk_name; ?></h4><br/>
                    <?php echo $vperk->perk_description; ?>.<br/><br/>
                    <b> 0 out of <?php echo $vperk->number_available; ?> claimed</b><br/>
                    <b>Estimated Delivery:</b> <?php echo $vperk->month; ?> <?php echo $vperk->year; ?><br/>
                    <b>Ships <?php echo $vperk->shipping_address; ?></b>
                </div>
            </a>
            <br/>

        <?php } ?>
    </div>

</div>     