<!-- enterpreneur upload your project starts -->
<div id="entrepreneur_upload_your_project">
    <h1>Please Give Your Campaign Title</h1>

    <div class="entrepreneur_upload_your_project_form">
        <form action="<?php echo base_url(); ?>uploader/save_project_title" method="post">

            <input type="text" name="project_title" placeholder="My Campaign Title" value="CAMPAIGN TITLE"/>
            <input type="text" name="country" placeholder="Your Country" value=""/>
            <input type="text" name="city" placeholder="Your City" value=""/>
            What your Demand: <input type="text" name="demand" placeholder="Upto 50000 Taka" value="50000"/>

            <a href="#"><button class ="entrepreneur_upload_your_project_form_button"><span>SAVE AND CONTINUE</span></button></a>

        </form>
    </div>

</div>
<!-- enterpreneur upload your project ends -->

