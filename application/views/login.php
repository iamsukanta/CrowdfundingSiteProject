
<h3>
    <?php
    $exception = $this->session->userdata('exception');
    if (isset($exception)) {
        echo $exception;
        $this->session->unset_userdata('exception');
    }
    ?>
</h3>


<!-- Register form starts-->
<div class="register_form_starts">
    <h1>Log In</h1>
    <!-- Origin form starts -->
    <div class="form_structure">
        <form action="<?php echo base_url(); ?>welcome/check_login" method="post" onsubmit="return validateStandard(this)">
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />

            <button id="Sign_Up_Button">LOG IN </button>

            <p id="new_user_text">Are you new user? Please<a href="<?php echo base_url(); ?>welcome/sign_up"> Sign Up.</a></p>
            <!-- <button id="facebook_button">Or Continue with facebook</button>
            <p id="Alternative_Signup_text"> Or sign up with facebook</p>
            -->

        </form>
    </div>
    <!-- Origin form ends -->

</div>



