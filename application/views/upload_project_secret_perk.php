  
<a href="<?php echo base_url(); ?>project_uploader/upload_project_perk"><button id="myAddPerkBtn"class ="upload_project_details_inner_sidebar_right_add_perk_button"><span>ADD PERK</span></button></a>
<a href="#"><button id="myAddSecretPerkBtn"class ="upload_project_details_inner_sidebar_right_add_secret_perk_button"><span>ADD SECRET PERK</span></button></a>
<!-- Modal Pages add secret perk starts -->

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-content-inner">
            <form action="<?php echo base_url(); ?>project_uploader/save_project_secret_perk" method="post">
                <span class="close">Close</span>
                <h2>Perk Details</h2>
                <p class="modal-content-inner-text-contribution-amount">Contribution Amount</p>

                <input type="text" class="perk_contribution_amount" name="contribution_amount" value="" placeholder="Taka"/>

                <p class="modal-content-inner-text-perk-name">Perk Name</p>

                <input type="text" name="perk_name" class="perk_contribution_amount1" value=""/>

                <p>Perk Description</p>

                <textarea name="perk_description" rows="6" cols="55"></textarea><br/>500/500 <br/>

                <p class="number-content-inner-number-available-text"><br/>Number Available<span class="modal-page-optional-text">(Optional)</span></p>

                <p class="number-content-inner-number-available-text1"><br/>Estimated Delivery Date<span class="modal-page-optional-text">(Optional)</span></p>



                <input type="text" class="delivery-form" name="number_available" value="" placeholder="Taka"/>
                <input type="hidden" name="perk_type" value="2"/>

                <select id="modal-page-estimated-delivery-month-select" name="month">
                    <option value="select-month"> Month</option>
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>

                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>

                <select id="modal-page-estimated-delivery-year-select" name="year">
                    <option value="select-month">Year</option>
                    <option value='2016'>2016</option>
                    <option value='2017'>2017</option>
                    <option value='2018'>2018</option>
                    <option value='2019'>2019</option>

                    <option value='2020'>2020</option>
                    <option value='2021'>2021</option>
                    <option value='2022'>2022</option>
                </select>

                <p class="number-content-inner-number-available-text"><br/>Shipping Address Required<span class="modal-page-optional-text">(Optional)</span></p>

                <!-- javascript Tab starts -->
                <ul class="tab">
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'No')">No</a></li>
                    <li><a href="#" class="tablinks" onclick="openTab(event, 'Yes')">Yes</a></li>
                </ul>

                <div id="Yes" class="tabcontent">
                    <p><br/>Shipping Location(s)<p>
                    <p class="modal-page-optional-text">Perks ships only to the following location.</p>
                    <select id="modal-page-shipping-location-select" name="shipping_address">
                        <!-- Script by hscripts.com -->
                        <option value=" ">Select Country.......</option>
                        <script type="text/javascript">
                            printCountryOptions();
                        </script>
                    </select>

                    <p><br/>Shipping Fee</p>
                    <p class="modal-page-optional-text">Fee is added to the contribution amount.</p>

                    <input type="text" name="shipping_fee" value="" placeholder="Taka"/>


                </div>
                <!-- javascript tab ends -->


        </div>

        <div id="modal-footer">

        </div>

        <a href="#"><button class ="modal_content_button_save"><span>SAVE</span></button></a>

        <!--<a href="#"><button class ="modal_content_button_cancel"><span>CANCEL</span></button></a>-->




    </div>
    <!-- Modal Content ends -->

</div>
</form
<!-- Modal pages add secret perk ends -->
