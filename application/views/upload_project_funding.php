<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/entrepreneur_upload_your_project_details_funding.css">
</head>
<div id="upload_project_details">
    <h1><?php
        $project_title = $this->session->userdata('project_title');
        ?>
        &nbsp;<?php echo $project_title; ?></h1>                <div class="upload_project_details_inner">
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
        <div id="upload_project_details_inner_sidebar_right">
            <h1>Funding </h1>
            <p>Provide us with information about your funding needs. Options vary depending on your campaign currency, funds recipient, and funding type.</p>

            <h1>Payments By PayPal</h1>
            <br/>
            <p>Contributions received via PayPal are held until your campaign's deadline, then sent to your PayPal account within 15 business days.</p>
            <br/>
            <p>Please make sure your PayPal account meets these requirements to successfully receive payments.</p>
            <br/><br/>
            <form id="paypal_form" action="<?php echo base_url(); ?>project_uploader/save_project_funding" method="post" onsubmit="return validateStandard(this)">
                PayPal First Name<br/>
                <input type="text" name="paypal_first_name" required="1" regexp="JSVAL_RX_ALPHA" value="<?php echo $result->paypal_first_name; ?>"/><br/><br/>
                PayPal Last Name<br/>
                <input type="text" name="paypal_last_name" required="1" regexp="JSVAL_RX_ALPHA" value="<?php echo $result->paypal_last_name; ?>"/>
                <br/><br/>
                PayPal  Email<br/>
                <input type="text" name="paypal_email" required="1" regexp="JSVAL_RX_EMAIL" value="<?php echo $result->paypal_email; ?>"/>
                <br/>

                <a href="#"><button class ="paypal_form_button"><span>VALIDATE & SAVE</span></button></a>

            </form>


            <!-- javascript Tab starts -->
            <!-- <div id="tab_class_starts">

                <ul class="tab">
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'No')">Flexible Funding</a></li>
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'Yes')">Fixed Funding</a></li>
                </ul>
                <h2>Credit Card Payment Setup</h2>
                <p>Do you want to enable credit card payments for your campaign? The funds received by credit cards are held until your campaign's deadline, then sent as a lump sum to your bank account within 15 business days. Once you receive your first contribution, we will ask you to return to this page to fill out your bank account information.</p>

                <br/><br/>

                <input type="radio" name="radio-button_ignore_credit_card" value=""> No, I do not want to accept credit card payments.
                <br/>
                <br/>
                <input type="radio" name="radio-button_accept_credit_card" value=""> Yes, I do want to accept credit card payments (including Apple Pay).
                <br/>
                <br/>
                <br/>
                <div class="border_bottom">
                    
                </div>
                <br/><br/>
                <h2>Paypal Payment Setup</h2>
                <br/>
                <p>Do you want to enable payments using PayPal? Contributions received via PayPal are held until your campaign's deadline, then sent to your PayPal account within 15 business days. Please make sure your PayPal account meets these requirements to successfully receive payments.</p>

                <br/><br/>

                <input type="radio" name="radio-button_ignore_paypal" value=""> No, I do not want to accept payments using PayPal.

                <br/>
                <br/>
                <input type="radio" name="radio-button_accept_paypal" value=""> Yes, I do want to accept payments using PayPal.
                <br/>
                <br/>
                <br/>
                <div class="border_bottom">
                    
                </div>
                <br/><br/>
                <h2>Funds Recipient</h2>
                <p>Who should Punji send the funds collected for your campaign?</p>
                <br/>
          

                <ul class="tab2">
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'an-individual')">AN INDIVIDUAL</a></li>
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'a-business')">A BUSINESS</a></li>
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'a-nonprofit')">A NONPROFIT</a></li>
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'other')">OTHER</a></li>
                </ul>

                <div id="a-nonprofit" class="tabcontent">
                    <p><br/>501(c)(3) Nonprofit Registration<span class="a-business-required">*</span><p>
                    <p>Is this non-profit a registered 501(c)(3) in the United States?</p>
                    <br/><br/>

                    <input type="radio" name="radio-button_no_nonprofit_registration" value=""> No, this nonprofit is not a registered 501(c)(3).

                    <br/>
                    <br/>
                    <input type="radio" name="radio-button_yes_nonprofit_registration" value=""> Yes, this nonprofit is a registered 501(c)(3).
                    <br/>
                    <br/>

                </div>

                    
                                
                </div>




                <div id="Yes" class="tabcontent">
                    <p><br/>Shipping Location(s)<p>
                    <p class="modal-page-optional-text">Perks ships only to the following location.</p>
                    <p><br/>Shipping Fee</p>
                    <p class="modal-page-optional-text">Fee is added to the contribution amount.</p>
                                
                    <input type="text" name="contribution_amount" value="" placeholder="Taka"/>

                </div>

            </div>
            -->
            <!-- javascript tab ends -->


        </div>

    </div>


</div>
