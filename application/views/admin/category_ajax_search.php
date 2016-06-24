<table border="1" align="center">
    <tr>
        <th>  category name</th>
        <th>category description</th>
        <th>category_image</th>
        <th> Action</th>

    </tr>
    <?php
    foreach ($all_category as $v_category) {
        ?>
        <tr>
            <td><?php echo $v_category->category_name; ?></td>
            <td><?php echo $v_category->category_description; ?>
            </td>
            <td>
                <img src="<?php echo base_url(); ?><?php echo $v_category->category_image; ?>" alt="Image" width="200" height="200"/>
            </td> <td>
                <a href="<?php echo base_url(); ?>super_admin/edit_category/<?php echo $v_category->category_id; ?>">Edit</a> |
                <a href="<?php echo base_url(); ?>super_admin/delete_category/<?php echo $v_category->category_id; ?>" onclick="return checkDelete();">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>
