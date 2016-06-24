<?php
$exception = $this->session->userdata('error');
if (isset($exception)) {
    echo $exception;
    $this->session->unset_userdata('error');
}
?>

<h3>
    <?php
    $message = $this->session->userdata('message');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</h3>

<form action="<?php echo base_url(); ?>welcome/save_user" method="post" onsubmit="return validateStandard(this)" enctype="multipart/form-data">
    <!-- notification bar ends -->

    <!-- Register form starts-->
    <div class="register_form_starts">
        <h1>SIGN UP</h1>
        <!-- Origin form starts -->
        <div class="form_structure">

            <input type="text" name="first_name" placeholder="First Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter First Name..."/>
            <input type="text" name="last_name" placeholder="Last Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter last Name..."/>
            <input type="text" name="email" placeholder="Email" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address..." />

            <input type="password" name="password" placeholder="Password" required="1" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Enter Password.."/>
            <input type="password" name="confirm_password" placeholder="Re-enter Password" equals="password" />
            <div id="checkbox">                   
                <input type="checkbox" name="checkbox" value="" class="checkbox_id" required="1"><p id="p1">By Signing up you agree to our <a href="#">Terms and Condition</a> of Use and <a href="#"> Privacy Policy.</a></p><br/>
            </div>

            <input type="submit" name="btn"  value="SIGN UP"/>

            <p id="new_user_text">Already have an account? Please<a href='<?php echo base_url(); ?>welcome/user_login'> Log In.</a></p>
            <!-- <button id="facebook_button">Or Continue with facebook</button>
            <p id="Alternative_Signup_text"> Or sign up with facebook</p>
            -->


        </div>
        <!-- Origin form ends -->

    </div>
</form>









