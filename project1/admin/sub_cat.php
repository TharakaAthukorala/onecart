<div id="bodyright">
<h3>View All Sub Categories</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Sub Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
            <?php include("include/function.php"); echo viewall_sub_category(); ?>
            
        </table>
    </form>

    <h3 id="add_cat">Add New Sub Category From Here</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>Select Category Name:</td>
                <td>
                    <select name="main_category">
                        <?php echo viewall_cat(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Sub Category Name:</td>
                <td><Input type="text" name="sub_cat_name"></Input></td>
            </tr>
        </table>
        <center><button name="add_sub_cat">Add Sub Category</button></center>
    </form>
</div>

<?php    
    // include("include/function.php"); //v 11
    echo add_sub_cat();
?>