<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
        <title>SimpleAdmin</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_css/login.css" media="screen" />
    </head>
    <body>
        <div class="wrap">
            <div id="content">
                <div id="main">
                    <div class="full_w">
                        <?php
                        $exception = $this->session->userdata('exception');
                        if (isset($exception)) {
                            echo $exception;
                            $this->session->unset_userdata('exception');
                        }
                        ?>

                        <form action="<?php echo base_url(); ?>admin_login/check_admin_login" method="post" onsubmit="return validateStandard(this)">
                            <label for="login">Username:</label>
                            <input id="login" name="admin_email_address" class="text" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address... />
                                   <label for="pass">Password:</label>
                                <input id="pass" name="admin_password" type="password" class="text" required="1" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Enter Password.. />
                                       <div class="sep"></div>
                                    <button type="submit" class="ok">Login</button> <a class="button" href="">Forgotten password?</a>
                                    </form>
                                    </div>
                                    <div class="footer">&raquo; <a href="">http://punji.com</a> | Admin Panel</div>
                                    </div>
                                    </div>
                                    </div>

                                    </body>
                                    </html>
