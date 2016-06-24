<h3>
    <?php
    $exception = $this->session->userdata('exception');
    if (isset($exception)) {
        echo $exception;
        $this->session->unset_userdata('exception');
    }
    ?>
</h3>
<!-- sliding starts -->
<div id="sliding_division">
    <div class="wrapper">
        <!-- <h1>Connected Carousels</h1>
        
        <p>This example shows how to connect two carousels together so that one carousels acts as a navigation for the other.</p>
        -->
        <div class="connected-carousels">
            <div class="stage">
                <div class="carousel carousel-stage">
                    <ul>
                        <?php foreach ($all_project as $v_project) {
                            ?>
                            <li><a href="<?php echo base_url(); ?>welcome/single_project/<?php echo $v_project->project_id; ?>"><img src="<?php echo base_url() ?><?php echo $v_project->card_image; ?>" width="1100" height="500" alt=""></a></li> 
                        <?php } ?>
                    </ul>
                </div>
                <p class="photo-credits">
                    Photos by <a href="#">punji.com</a>
                </p>
                <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
            </div>

            <div class="navigation">
                <a href="#" class="prev prev-navigation">&lsaquo;</a>
                <a href="#" class="next next-navigation">&rsaquo;</a>
                <div class="carousel carousel-navigation">

                    <ul>
                        <?php foreach ($all_project as $v_project) {
                            ?>
                            <li><img src="<?php echo base_url() ?><?php echo $v_project->card_image; ?>" width="80" height="80" alt=""></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>  

</div>
<!-- sliding ends -->

<!-- body_content1 starts -->
<div id="body_content_1">
    <!-- Entrepreneur box starts -->
    <div id="entrepreneur">

        <p class="entrepreneur_text1">For Entrepreneur</p>
        <div class="button">
            <a href="<?php echo base_url(); ?>uploader/upload_project_title">  <p class="button_text">Upload Project</p>  </a>  
        </div>
        <p class="entrepreneur_text2">where you want to get funding.</p> 

    </div>
    <!-- Entrepreneur box ends -->

    <!-- Investor box starts -->
    <div id="investor">

        <p class="investor_text1">For Investor</p>
        <div class="button">
            <a href="<?php echo base_url(); ?>welcome/all_category"> <p class="button_text">Invest Project</p></a>   
        </div>
        <p class="investor_text2">where you want to funding.</p>  

    </div>
    <!-- Investor  box ends -->

    <!-- Helper box starts  -->
    <div id="helper">

        <p class="helper_text1">For Helper</p>
        <div class="button">
            <p class="button_text">Raise Your Hand</p>   
        </div>
        <p class="helper_text2">where you want to help the helpless people.</p>  


    </div>
    <!-- Helper box ends -->

</div>
<!-- body_content1 ends -->

<!-- body_content2 starts -->
<div id="body_content_2">

    <p id="categories_header_text">Explore Categories</p>

    <div id="categories">


        <?php foreach ($home_category as $v_category) {
            ?>


            <a href='<?php echo base_url(); ?>welcome/single_category/<?php echo $v_category->category_id; ?>'>  <div class="categories_box">
                    <div class="cat_hero"><img width="100%" src="<?php echo base_url() . $v_category->category_image; ?>"/></div>
                    <p class="cat_text"><?php echo $v_category->category_name; ?></p>  

                </div>
            </a>
        <?php } ?>
        <div class="categories_box_last">
            <a href='<?php echo base_url(); ?>welcome/explore_category'> <img id="cat_more" src='<?php echo base_url(); ?>images/logo/more.png' alt="image" height="50" width="50" /></a>
        </div>



    </div>   
</div>
<!-- body_content2 ends -->

<!-- body_content3 starts -->
<div id="body_content_3">

    <a href="#"><div class="circle_button">
            <span class="circle_button_font_awesome"><i class="fa fa-history" aria-hidden="true">
                </i> </span>
        </div></a>

    <a href="#"> <div class="circle_button">
            <span class="circle_button_font_awesome"><i class="fa fa-arrow-circle-right" aria-hidden="true">
                </i> </span>
        </div></a>
    <a href="#">
        <div class="circle_button">
            <span class="circle_button_font_awesome"><i class="fa fa-hand-o-down" aria-hidden="true">
                </i> </span>
        </div> </a>
    <div>
        <p class="button_under_text1">Our History </p>
        <p class="button_under_text2">Our Goal and Objective </p>
        <p class="button_under_text3">Our present Condition </p>
    </div>


</div>
<!-- body_content3 ends -->

<!-- body_content4 starts -->
<div id="body_content_4">
    <div id="text_content">
        <p class="text_format">Complete Your Dream Project with Punji.com</p>
        <a href="#"><div id="learn_more_button">
<!--            <p class="p">Learn More</p>-->
                Learn More
            </div> </a>
        <p class="text_format1">About Punji.com</p>
        <p class="text_format2">Connect us with facebook</p> 
        <a href="#"> <div id="facebook_button">
                Facebook
            <!--<p class="p">Facebook</p>-->
            </div> </a>


    </div>   
</div>
<!-- body_content4 ends -->

