<<form action="<?php echo base_url(); ?>super_admin/save_project_category" method="post" onsubmit="return validateStandard(this)" enctype="multipart/form-data" >
    <h2 align="center"> <u>Add Project Category</u></h2>  
    <table border="0" align="center" >
        <tr> 
            <td>Category Name:</td>
            <td><input type="text" name="category_name" placeholder="Category Name" tabindex="1" maxlength="25" required="0"  err="Enter Your Category Name" size="40" /><span class="required"> * </span></td> 
        </tr>
        <tr>
            <td>Category Description:</td>
            <td>
                <textarea name="category_description" placeholder="Category Description"  tabindex="2" cols="31" required="0"></textarea>  
                <span class="required"> * </span></td> 
        </tr> 
        <tr>
            <td>
                Category Image
            </td>
            <td>
                <input type="file" name="category_image" tabindex="8" required="1"/>
            </td>
        </tr>
<!--        <tr>
            <td>
                Category Icon
            </td>
            <td>
                <input type="file" name="category_icon" tabindex="8" required="1"/>
            </td>
        </tr>-->

        <tr>
            <td colspan="2" align="center"><input type="submit" name="btn" tabindex="6" value="Save"/></td>
        </tr>
    </table>
</form>


