<head>  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/searching_category_page.css"></head>

<div id="searching_category_page">
    <br/>
    <br/>
    <h1>Search Popular Category</h1>
    <br/>
    <select id="searching-by-category-name" name="category_id">
        <option value="0">all category</option>
        <?php foreach ($all_category as $vcategory) {
            ?><option value="<?php echo $vcategory->category_id; ?>"><?php echo $vcategory->category_name; ?></option>
        <?php } ?>

    </select>
    <select id="searching-by-projects-types" name="">
        <!--<option value="select-month"> Month</option>-->
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
    <select id="searching-by-most-funded-projects" name="">
        <option value="select-month">All Categories</option>


    </select>

    <br/><br/>
    <b>Showing result for:</b>
    <br/><br/>





    <?php foreach ($single_category as $V_category) {
        ?>
        <a href="<?php echo base_url(); ?>welcome/single_project/<?php echo $V_category->project_id; ?>">
            <div class="searching-category-page-inner-content">
                <img src="<?php echo base_url(); ?><?php echo $V_category->card_image; ?>" width="267px" height="200px" alt="technology_category1.jpg image"/>
                <br/>
                <div class="searching-category-page-inner-content-text-division">
                    <?php echo $V_category->category_name; ?><br/><br/>
                    <b><?php echo $V_category->project_title; ?></b><br/>
                    <?php echo $V_category->first_name . ' ' . $V_category->last_name; ?><br/><br/>
                    <?php echo $V_category->tagline; ?>
                    <br/><br/><br/>
                    <b><?php echo $V_category->demand; ?></b> Taka
                    <div class="searching-category-page-inner-content-inner">
                        <div class="searching-category-page-inner-content-inner-fill-up4">

                        </div><br/>
                        <p class="searching-category-page-inner-content-text-division-bottom-text">80% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <?php echo $V_category->deadline; ?> days left<br/></p>

                    </div>
                </div>


            </div>
        </a>
    <?php } ?>

    <br/>


</div>
<?php echo $project ?>
    




