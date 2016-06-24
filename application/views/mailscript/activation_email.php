<h4>
    Hello <?php echo $first_name; ?>
</h4>
<p>
    Your's project are successfully saved..
    Thank You to join our community..
</p>
<p>
    Your PayPal  Info<br/>
    <strong>
        PayPal Email : 
    </strong><?php echo $to_address; ?><br/>




</p>
<p> To Active ur Account click the link
    <a href="<?php echo base_url() ?>project_uploader/active_paypal_account/<?php echo $project_id ?>">
        <?php echo base_url() ?>project_uploader/active_paypal_account
    </a>
</p>
<p>
    <strong>Regards</strong>
    punji
</p>

