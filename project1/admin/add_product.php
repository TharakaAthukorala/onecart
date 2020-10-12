<div id="bodyright"> <!---11--->
    <h3>Add New Product From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Product Name:</td>
                <td><Input type="text" name="pro_name" /></td>
            </tr>
            <tr>
                <td>Select Category Name:</td>
                <td><select name="cat_name"><?php include("include/function.php"); echo viewall_cat(); ?></select></td>
            </tr>
            <tr>
                <td>Select Sub Category Name:</td>
                <td><select name="sub_cat_name"><?php echo viewall_sub_cat(); ?></select></td>
            </tr>
            <tr>
                <td>Select Product Image 1:</td>
                <td><Input type="file" name="pro_img1" /></td>
            </tr>
            <tr>
                <td>Select Product Image 2:</td>
                <td><Input type="file" name="pro_img2" /></td>
            </tr>
            <!-- <tr>
                <td>Select Product Image 3:</td>
                <td><Input type="file" name="pro_img3" /></td>
            </tr>
            <tr>
                <td>Select Product Image 4:</td>
                <td><Input type="file" name="pro_img4" /></td>
            </tr> -->

            <tr>
                <td>Enter Description 1:</td>
                <td><Input type="text" name="pro_feature1" /></td>
            </tr>
            <tr>
                <td>Enter Description 2:</td>
                <td><Input type="text" name="pro_feature2" /></td>
            </tr>
            <tr>
                <td>Enter Description 3:</td>
                <td><Input type="text" name="pro_feature3" /></td>
            </tr>
            <!-- <tr>
                <td>Enter Feature 4:</td>
                <td><Input type="text" name="pro_feature4" /></td>
            </tr>
            <tr>
                <td>Enter Feature 5:</td>
                <td><Input type="text" name="pro_feature5" /></td>
            </tr> -->

            <tr>
                <td>Enter Price:</td>
                <td><Input type="text" name="pro_price" /></td>
            </tr>
            <!-- <tr>
                <td>Enter Product ID:</td>
                <td><Input type="text" name="pro_key" /></td>
            </tr> -->
            <tr>
                <td>Enter Keyword:</td>
                <td><Input type="text" name="pro_keyword" /></td>
            </tr>

        </table>
        <center><button name="add_product">Add Product</button></center>
    </form>
</div>

<?php
    echo add_pro();
?>