<div id="Origin_Profile">
    <!-- profile menu starts -->
    <div id="profile_menu">
        <?php $full_name = $this->session->userdata('full_name'); ?>
        <h1>  <?php echo $full_name; ?></h1>
    </div>
    <!-- profile inner starts -->
    <!--            <div id="profile_inner">
    
                    <div class="profile_container">
                              
                        <div class="i-float-tab-links">
                            <span class="i-tab i-selected">
                                <span>
                                    <a href="<?php echo base_url(); ?>uploader/my_profile">Your Profile</a>
                                </span>
                            </span>
                            
                            <span class="i-tab i-selected ">
                                <span>
                                    <a href="<?php echo base_url(); ?>uploader/my_settings">Settings</a>
                                </span>
                            </span>
                        </div>
                    
                    </div>
                </div>-->
    <h1 >Campaign's I'm on</h1>
    <?php foreach ($result as $vresult) { ?>
        <div class="my_campaign_details">





            <div class="show_card_image">

                <img src="<?php echo base_url(); ?><?php echo $vresult->card_image; ?>"alt=" Project Image" width="200" height="200"/>
            </div>

            <div class="show_project_title">
                <div class="project_title"><?php echo $vresult->project_title; ?> &nbsp; &nbsp;
                    <span class="draft"> Draft</span>

                </div>
                <div class="project_tagline">
                    <?php echo $vresult->tagline; ?>
                </div>
            </div>   


            <div class="project_action"><li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"> ACTION <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>uploader/project_title_edit/<?php echo $vresult->project_id; ?>">Edit</a></li>
                        <li><a href="<?php echo base_url(); ?>uploader/project_delete/<?php echo $vresult->project_id; ?>" onclick="return checkDelete();"> Delete</a> </li>

                    </ul>
                </li>


            </div>





        </div>

    <?php }
    ?>
    <?php echo $my_campaigns; ?>