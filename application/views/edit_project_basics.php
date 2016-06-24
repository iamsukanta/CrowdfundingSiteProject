<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.tagsinput.css" />
    <!--	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>

    <script type="text/javascript">

        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
        }

        $(function() {


            $('#tags_3').tagsInput({
                width: 'auto',
                //autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
                //				autocomplete_url:'' // jquery ui autocomplete requires a json endpoint
            });


            // Uncomment this line to see the callback functions in action
            //			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

            // Uncomment this line to see an input with no interface for adding new tags.
            //			$('input.tags').tagsInput({interactive:false});
        });

    </script>

</head>


<!-- upload project details starts -->
<?php
$exception = $this->session->userdata('error');
if (isset($exception)) {
    echo $exception;
    $this->session->unset_userdata('error');
}
?>    

<div id="upload_project_details">
    <h1><?php
        $project_title = $this->session->userdata('project_title');
        ?>
        &nbsp;<?php echo $project_title; ?></h1>
    <div class="upload_project_details_inner">
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
        <form action="<?php echo base_url(); ?>project_uploader/update_project_basics" method="post" enctype="multipart/form-data">

            <div class="upload_project_details_inner_sidebar_right">
                <h1 id="basics_heading">Basics</h1>
                <p>Make a good first impression: introduce your campaign objectives and entice people to learn more. This basic information will represent your campaign on your campaign page, on your campaign card, and in searches.</p>
                <form>
                    <p id="basics_text_tag">Tagline</p>
                    <textarea name="tagline" rows="4" cols="60"><?php echo $result->tagline; ?></textarea><br/>100/100 <br/>

                    <p id="basics_text_tag_campaign_card_image">Campaign Card Image</p>

                    <a href="#"><div id="Campaign_card_image"><img src="<?php echo base_url(); ?><?php echo $result->card_image; ?>" alt="Go" width="200" height="200"/>
                            <p class="Campaign_card_image_button_text"> </p></div></a>
                    <!--  <label  class="custom-file-input1">
                         <input type="file">
                     </label>
                    -->
                    <label  class="custom-file-input">
                        <input type="hidden" name="old_card_image" value="<?php echo $result->card_image; ?>"/>
                        <input type="file" name="card_image" />
                    </label>



                    <p id="basics_text_tag_catagory">Category</p>
                    <select id="basics_text_tag_catagory_name" name="category_id">
                        <option value="<?php echo $result->category_id; ?>"><?php echo $result->category_name; ?></option>
                        <?php foreach ($all_category as $v_category) {
                            ?><option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                        <?php } ?>
                    </select>


                    <p class="basics_text_tag_heading">Tags(Choose up to 2 tags)</p>
<!--                    <span id="tag_form">-->
<!--                        <input type="text" name="tags" placeholder="Please give some tag to find contents" value="<?php echo $result->tags ?>"/>-->
                    <p> <input id='tags_3' name="tags" type='text' class='tags' value="<?php echo $result->tags; ?>"></p>
                    <!--                    </span>-->


                        <!-- <p id="basics_text_tag">Deadlines</p> -->
                    <p class="basics_text_funding_deadlines">Deadlines</p>
                    <p id="basics_text_funding">Fundings ends <span id="days_limit">
                            <input type="text" name="deadline" placeholder="" value="<?php echo $result->deadline; ?>"/></span>
                    </p>
                    <p id="basics_text_60_days"> 60 days Maximum</p>

            </div>
            <button class ="upload_project_details_button"><span>SAVE & CONTINUE</span></button>

        </form>

    </div>


</div>
<!-- upload project details ends -->
