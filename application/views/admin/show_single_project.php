<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_css/show_single_project"/>
</head>
<body>
    <div id="project_title">
        <div id="project_name">
            <?php echo $single_project->project_title; ?>
        </div>        <div id="project_country">

            <div id="project_country">
                <img src=""/> &nbsp;   <?php echo $single_project->country; ?> 
                <img src=""/> &nbsp; <?php echo $single_project->category_name; ?>
            </div>
        </div>
        <hr>
        <div id="project_description">
            <div id="project_story">
            </div>
            <div id="card_image">
                <img src="<?php echo base_url(); ?><?php echo $single_project->card_image; ?>" alt="card_image" width="500px" height="300px"/>
            </div>
            <div id="tag_line">
                <?php echo $single_project->tagline; ?>
            </div>
            <div id="tags">
                <?php echo $single_project->tags; ?>
            </div>
            <div id="user_id">
                <?php echo $single_project->user_id; ?>
            </div>
            <hr>
            <div id="campaign_pitch">
                <?php echo $single_project->campaign_pitch; ?>
            </div>
            <div id="video_overlay_image">
                <img src="<?php echo base_url(); ?><?php echo $single_project->video_overlay_image; ?>" alt="image" width="200px;" height="100px"/>
            </div
            <div id="video_url">
                <?php echo $single_project->video_url; ?>
            </div>
            <div id="demand">
                <?php echo $single_project->demand; ?>
            </div>
            <div id="deadline">
                dead line is <?php echo $single_project->deadline; ?> days...
            </div>

            <?php foreach ($project_perk as $value) {
                ?>

                <div id="adding_perk_page">




                    <p><b><?php echo $value->contribution_amount; ?> </b>+<?php
                        if ($value->shipping_address == '') {
                            echo 'no shipping';
                        } else {
                            echo 'shipping';
                        }
                        ?></p>
                    <h4><?php echo $value->perk_name; ?><!--Wristocat Single--></h4>
                    <p> <?php echo $value->perk_description; ?></p>
                    <p><b><?php echo $value->number_available; ?> Claimed</b></p>
                    <p><b>Estimated Delivery:</b><?php echo $value->month; ?> <?php echo $value->year; ?></p>
                    <p><b>Ships <?php echo $value->shipping_address; ?></b></p>
                    <p><b>Shipping fee <?php echo $value->shipping_fee; ?></b></p>     
                </div>
            <?php } ?>

            <div id="">
                <h4>
                    Status: <?php
                    if ($single_project->admin_status == '1') {
                        echo 'Activate';
                    } else {
                        echo 'Deactivate';
                    }
                    ?>
                </h4>
            </div>
        </div>
</body>
