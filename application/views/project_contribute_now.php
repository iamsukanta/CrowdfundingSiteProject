<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/contribute-now-button-page.css">

    <script src="<?php echo base_url(); ?>js/contribute.js"></script>
</head> 
<!-- contribute-page-starts -->
<div class="contribute-page-button-starts">
    <div class="contribute-page-button-starts-left">
        <br/>
        <p><i style="font-size:1.2em;">You're contributing to <a href="#"><b><?php echo $single_project->first_name . ' ' . $single_project->last_name; ?></b></a>'s Campaign</i></p>
        <h1>
            <?php echo $single_project->project_title; ?></h1>
        <br/><br/>
        <p>Credit Card or Pay with Paypal</p>
        <br/><br/>

        <form class=" credit_or_paypal_form" action="<?php echo base_url(); ?>project_contribute/save_project_contribute" method="post" onsubmit="return validateStandardthis(this)">
            Name on Card<br/>
            <input type="hidden" name="project_id"  value="<?php echo $single_project->project_id; ?>"/>
            <input type="text" name="card_name" required="1" regexp="JSVAL_RX_ALPHA" value="" placeholder="Name on Card"/><br/><br/>
            Credit Card Number<br/>
            <input type="text" name="card_number" required="1" value="" placeholder="Credit Card Number"/>
            <br/><br/>
            Expiration Date<br/>
            <input type="text" name="e_date" required="1" value=""
                   placeholder="Expiration Date(MM/DD)"/>
            <br/><br/>
            Security Code<br/>
            <input type="text" name="security_code" required="1" value=""
                   placeholder="Security Code"/>
            <br/><br/>
            Billing Postal Code<br/>
            <input type="text" name="billing_postal_code" required="1" value=""
                   placeholder="Billing Postal Code"/>
            <br/>



            <br/><br/>
            <p><b>Contribution Appearance</b></p>
            Choose a name to be displayed publicly next to your contribution on the campaign page.<br/>
            <br/>



    </div>
    <div class="contribute-page-button-starts-right">
        <div class="contribute-page-button-starts-right-top">
            <p><b>Your have chosen this perk:</b>

            <div class="chosen-perk-details">
                <p><span class="chosen-perk-details-header-text"><b>৳<?php echo $chosen_perk->contribution_amount; ?></b></span>+<?php
                    if ($chosen_perk->shipping_address == '') {
                        echo 'no shipping';
                    } else {
                        echo 'shipping';
                    }
                    ?></p>
                <h4><?php echo $chosen_perk->perk_name; ?></h4><br/>
                <?php echo $chosen_perk->perk_description; ?>.<br/><br/>
                <b> 0 out of <?php echo $chosen_perk->number_available; ?> claimed</b>
                <b>Estimated Delivery:</b> <?php echo $chosen_perk->month; ?> <?php echo $chosen_perk->year; ?><br/>
                <b>Ships <?php echo $chosen_perk->shipping_address; ?></b>
            </div>
            <br/>
            <form class="contribution_amount_paypal_form">
                <span>I want &nbsp;</span>
                <input type="hidden" id="chosen_perk_value" type="text" name="value" value="<?php echo $chosen_perk->contribution_amount; ?>"/>
                <input id="chosen_perk_count" type="text" name="count" value="1" placeholder=""/>
                <span>&nbsp; of this.</span>
                <br/>                           
                <br/>

                <b>Total:&nbsp;&nbsp;</b><span id="total_contribution_amount" style="font-size:1.5em"><?php echo $chosen_perk->contribution_amount; ?></span> TAKA
                <br/><br/><br/>



                By clicking 'Submit Payment', you acknowledge you are contributing to a work-in-progress and not making a direct purchase. Perks are managed by campaigners and cannot be guaranteed by Indiegogo. You also acknowledge and agree to our codition.<br/><br/>

                <a href="#"><button class ="submit-payment-button"><span>SUBMIT PAYMENT</span></button></a>

            </form>
        </div>


    </div>

</div> 


<!-- contribute-page-ends -->
