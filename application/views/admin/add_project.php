<table border="2" align="center">

    <tr>
        <th> project title</th>

        <th> Action</th>
    </tr>
    <?php
    foreach ($project as $vproject) {
        ?>
        <tr>
            <td><a href="<?php echo base_url(); ?>super_admin/show_single_project/<?php echo $vproject->project_id; ?>"><?php echo $vproject->project_title; ?></a></td>

            <td>
                <a href="<?php echo base_url(); ?>super_admin/add_new_project/<?php echo $vproject->project_id; ?>">Activate</a> 
    <!--            <a href="<?php echo base_url(); ?>super_admin/block_user/<?php echo $vproject->project_id; ?>" onclick="return checkDelete();">Block</a>-->
            </td>
        </tr>
    <?php } ?>
</table>


