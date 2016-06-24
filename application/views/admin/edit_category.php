<form  action="<?php echo base_url(); ?>super_admin/update_category" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">
    <h2 align="center"> <u>Add  Category</u></h2>  
    <table border="0" align="center" >
        <tr> 
            <td>Category Name:</td>
            <td><input type="text" name="category_name" value="<?php echo $result->category_name; ?>"  placeholder="Category Name" tabindex="1" maxlength="25" required="0"  err="Enter Your Category Name" size="40" /><span class="required"> * </span></td> 
        </tr>
        <tr>
            <td>Category Description:</td>
            <td>
                <textarea name="category_description"  placeholder="Category Description"  tabindex="2" rows="10" cols="51" required="0"> <?php echo $result->category_description; ?></textarea>  
                <span class="required"> * </span>
                <input type="hidden" name="category_id" value="<?php echo $result->category_id; ?>"  />
            </td> 
        </tr>    
        <tr>
            <td>
                Category Image
            </td>
            <td>
                <img src="<?php echo base_url(); ?><?php echo $result->category_image; ?>"alt="  Image" width="200" height="200"/>
                <br/> <input type="file" name="category_image" value="<?php echo $result->category_image; ?>" />
            </td>
        </tr>


        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" tabindex="6" value="update"/></td>
        </tr>
    </table>

</form>
