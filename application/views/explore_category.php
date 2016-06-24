
<div class="explore_category">
    <div class="explore_category_title">
        Fund campaigns you love.

    </div>
    <div class="explore_category_name">
        <div class="today_campaigns">
            Today
            449 contributors
            have raised 59,940 Taka
            for 285 campaigns.

        </div>
        <div class="all_category_name">
            <div class="categories_box">
                <a href="<?php echo base_url(); ?>welcome/all_category"> <p class="cat_text"> all categories</p></a>
            </div>
            <?php foreach ($all_category as $v_category) {
                ?>
                <a href='<?php echo base_url(); ?>welcome/single_category/<?php echo $v_category->category_id; ?>'>  <div class="categories_box">
                        <div class="cat_hero"><img width="100%" src="<?php echo base_url() . $v_category->category_image; ?>"/></div>
                        <p class="cat_text"><?php echo $v_category->category_name; ?></p>  

                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

</div>

