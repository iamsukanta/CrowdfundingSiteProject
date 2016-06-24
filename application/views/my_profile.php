
<?php
$exception = $this->session->userdata('error');
if (isset($exception)) {
    echo $exception;
    $this->session->unset_userdata('error');
}
?>                                                                                                                                              <!-- notification bar ends -->

<!-- Origin profile starts  -->
<div id="Origin_Profile">
    <!-- profile menu starts -->
    <div id="profile_menu">
        <?php $full_name = $this->session->userdata('full_name'); ?>
        <h1> Welcome <?php echo $full_name; ?></h1>
    </div>
    <!-- profile inner starts -->
    <div id="profile_inner">

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
    </div>

    <div class="profile_details">
        <h1 class="header_details">Basic Info</h1>
        <div class="form_structuree">
            <form name="my_profile" action="<?php echo base_url(); ?>uploader/update_profile" method="post" enctype="multipart/form-data">
                First Name:<br/>
                <input type="text" name="first_name" placeholder="" value="<?php echo $result->first_name; ?>"/> <br/>
                Last Name: <br/>
                <input type="text" name="last_name" placeholder="" value="<?php echo $result->last_name; ?>"/> <br/>
                Country: <br/>
                <input type="text" name="country" placeholder="" value="<?php echo $result->country; ?>"/> <br/>
                City: <br/>
                <input type="text" name="city" placeholder="" value="<?php echo $result->city; ?>"/><br/>
                Postal Code: <br/>
                <input type="number" name="postal_code" placeholder="" value="<?php echo $result->postal_code; ?>"/>

        </div>

    </div>
    <div class="profile_details">
        <h1 class="header_details">Your Story</h1>
        <div class="form_structuree">

            Short Description:<br/>
            <input type="text" name="short_description" placeholder="" value="<?php echo $result->short_description; ?>" id="description_form" /> <br/>
            About Me: <br/>
            <textarea name="message" rows="15" cols="85" id="ck_editor"  placeholder=""><?php echo $result->message; ?></textarea> <?php echo display_ckeditor($check_editor['ckeditor']); ?> 



        </div>

    </div>
    <div class="profile_details">
        <h1 class="header_details">Your Photo</h1>
        <div class="form_structuree">

            Profile Image<br/>
            <div id="image_button">
                <img src="<?php echo base_url(); ?><?php echo $result->profile_image; ?>"alt=" Profile Image" width="130" height="130"/>
            </div>
            <!--<button class ="image_button_left"><span>Upload Image</span></button>-->
            <input type="file" name="profile_image" />
        </div> 


    </div>

    <div class="profile_details">
        <h1 class="header_details">Outside Links</h1>
        <div class="form_structuree_outside_link">

            Facebook Link:<br/>
            <input type="text" name="facebook_link" placeholder="" value="<?php echo $result->facebook_link; ?>"/> <br/>
            <br/>
            <br/>
            <button class ="image_button_right"><span>Save</span></button>
            </form>
        </div>

    </div>

</div>


<!-- <div id="profile_inner">
    
</div> -->
<!-- profile inner ends -->


<!-- profile menu ends -->


<!-- Footer starts -->
