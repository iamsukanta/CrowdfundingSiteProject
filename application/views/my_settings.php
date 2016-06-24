<!DOCTYPE html>
<html lang="en">

    <!-- notification bar ends -->

    <!-- Origin profie starts  -->
    <div id="Origin_Profile">
        <!-- profile menu starts -->
        <div id="profile_menu">
            <?php $full_name = $this->session->userdata('full_name'); ?>
            <h1> Welcome <!-- php echo statement --> <?php echo $full_name; ?></h1>
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
            <h1 class="header_details">Update Your Password</h1>
            <div class="form_structuree">
                <form name="my_settings" action="<?php echo base_url(); ?>uploader/update_settings" method="post">
                    Current Password:<br/>

                    <input type="password" name="current_p" placeholder="" value=""/> <br/>
                    New Password: <br/>
                    <input type="hidden" name="user_id" />
                    <input type="password" name="new_p" placeholder="" value=""/> <br/>
                    Confirm Password: <br/>
                    <input type="password" name="confirm_p" placeholder="" value=""/><br/>
                    <br/><br/>
                    <button class ="image_button_left"><span>Save</span></button>
                </form>
            </div>

        </div>













    </div>


</div>

</div>


<!-- <div id="profile_inner">
    
</div> -->
<!-- profile inner ends -->


<!-- profile menu ends -->







</body>
</html>