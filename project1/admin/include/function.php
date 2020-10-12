<?php
    function add_cat(){
        include("include/db.php");
    
        if(isset($_POST['add_cat'])){
            $cat_name=$_POST['cat_name'];
            $add_cat=$con->prepare("INSERT INTO main_category(cat_name)VALUES('$cat_name')");
            if($add_cat->execute()){
                echo "<script>alert('Category Added Successfully !')</script>";
                echo "<script>window.open('indexadmin.php?viewall_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Category Not Added Successfully !')</script>";
            }
            // $add_cat->execute();
        }
    }

    function add_sub_cat(){
        include("include/db.php");
    
        if(isset($_POST['add_sub_cat'])){
            $cat_id=$_POST['main_category'];
            $sub_cat_name=$_POST['sub_cat_name'];

            $add_sub_cat=$con->prepare("INSERT INTO sub_cat(sub_cat_name, cat_id)VALUES('$sub_cat_name', '$cat_id')");
            if($add_sub_cat->execute()){
                echo "<script>alert('Sub Category Added Successfully !')</script>";
                echo "<script>window.open('indexadmin.php?viewall_sub_cat', '_self')</script>";
            }
            else{
                echo "<script>alert('Sub Category Not Added Successfully !')</script>";
            }
            // $add_cat->execute();
        }
    }

    function viewall_cat(){
        include("include/db.php");
            $fetch_cat=$con->prepare("SELECT * FROM main_category");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
                            
            while($row=$fetch_cat->fetch()):
                echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
            endwhile;
    }

    function viewall_category(){
        include("include/db.php");
        $fetch_cat=$con->prepare("SELECT * FROM main_category ORDER BY cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $i=1;

        while($row=$fetch_cat->fetch()):
            // echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
            echo "<tr>
                    <td style='min-width:15px'>".$i++."</td>
                    <td >".$row['cat_name']."</td>
                    <td style='min-width:50px'><a href='indexadmin.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
                    <td style='min-width:50px'><a href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td>
                 </tr>";
        endwhile;                            

    }

    function viewall_sub_cat(){
        include("include/db.php");
            $fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat");
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
                            
            while($row=$fetch_sub_cat->fetch()):
                echo"<option value='".$row['cat_id']."'>".$row['sub_cat_name']."</option>";
            endwhile;
    }

    function viewall_sub_category(){
        include("include/db.php");
        $fetch_cat=$con->prepare("SELECT * FROM sub_cat ORDER BY sub_cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $i=1;

        while($row=$fetch_cat->fetch()):
            // echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
            echo "<tr>
                    <td style='min-width:15px'>".$i++."</td>
                    <td style='min-width:80px'>".$row['sub_cat_name']."</td>
                    <td style='min-width:50px'><a href='indexadmin.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
                    <td style='min-width:50px'><a href='delete_sub_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
                 </tr>";
        endwhile;                            

    }

    function add_pro(){
        include("include/db.php");
    
        if(isset($_POST['add_product'])){
            $pro_name=$_POST['pro_name'];
            $cat_id=$_POST['cat_name'];
            $sub_cat_id=$_POST['sub_cat_name'];  //v 12
            
            $pro_img1=$_FILES['pro_img1']['name'];
            $pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];

            $pro_img2=$_FILES['pro_img2']['name'];
            $pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];

            move_uploaded_file($pro_img1_tmp, "../images/pro_img/$pro_img1");
            move_uploaded_file($pro_img2_tmp, "../images/pro_img/$pro_img2");

            $pro_feature1=$_POST['pro_feature1'];
            $pro_feature2=$_POST['pro_feature2'];
            $pro_feature3=$_POST['pro_feature3'];

            $pro_price=$_POST['pro_price'];

            $pro_keyword=$_POST['pro_keyword'];

            $add_cat=$con->prepare("INSERT INTO products(pro_name, cat_id, sub_cat_id, pro_img1, pro_img2, pro_feature1, pro_feature2, pro_feature3, pro_price, pro_keyword, pro_added_date)
                                    VALUES('$pro_name', '$cat_id', '$sub_cat_id','$pro_img1','$pro_img2', '$pro_feature1', '$pro_feature2', '$pro_feature3', '$pro_price', '$pro_keyword', NOW())");
            
            if($add_cat->execute()){
                echo "<script>alert('Product Added Successfully !')</script>";
            }
            else{
                echo "<script>alert('Product Not Added Successfully !')</script>";
            }
            // $add_cat->execute();
        }
    }

    function viewall_products(){       //v14
        include("include/db.php");

        $fetch_pro=$con->prepare("SELECT * FROM products");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                    <td style='min-width:50px'>".$i++."</td>
                    <td style='min-width:135px'>".$row['pro_name']."</td>
                    <td style='min-width:135px'>
                        <img src='../images/pro_img/".$row['pro_img1']."' />
                        <img src='../images/pro_img/".$row['pro_img2']."' />
                    </td>
                    <td>".$row['pro_feature1']."</td>
                    <td>".$row['pro_feature2']."</td>
                    <td>".$row['pro_feature3']."</td>
                    <td style='min-width:80px'>".$row['pro_price']."</td>
                    <td>".$row['pro_keyword']."</td>
                    <td style='min-width:150px'>".$row['pro_added_date']."</td>
                    <td style='min-width:60px'><a href='indexadmin.php?edit_pro=".$row['pro_id']."'>Edit<a/></td>
                    <td style='min-width:60px'><a href='delete_cat.php?delete_pro=".$row['pro_id']."'>Delete<a/></td>
                 </tr>";
        endwhile;
    }

    function edit_cat(){
        include("include/db.php"); //v15

        if(isset($_GET['edit_cat'])){
            $cat_id=$_GET['edit_cat'];

            $fetch_cat_name=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
            $row=$fetch_cat_name->fetch();

            echo "<form method='post'>
                        <table>
                            <tr>
                                <td>Edit Category Name:</td>
                                <td><Input type='text' name='edit_cat_name' value='".$row['cat_name']."' /></td>
                            </tr>
                        </table>
                        <center><button name='edit_cat'>Edit Category</button></center>
                    </form>";
            
                    if(isset($_POST['edit_cat'])){
                        $edit_cat_name=$_POST['edit_cat_name'];

                        $edit_cat=$con->prepare("UPDATE main_category SET cat_name='$edit_cat_name' WHERE cat_id='$cat_id'");
                        
                        if($edit_cat->execute()){
                            echo "<script>alert('Category Updated Successfully !')</script>";
                            echo "<script>window.open('indexadmin.php?viewall_cat', '_self')</script>";
                        }


                    }
        }
    }

    function edit_sub_cat(){
        include("include/db.php"); //v16

        if(isset($_GET['edit_sub_cat'])){
            $sub_cat_id=$_GET['edit_sub_cat'];

            $fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat WHERE sub_cat_id='$sub_cat_id'");
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
            $row=$fetch_sub_cat->fetch();

            $cat_id=$row['cat_id'];
            $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat=$fetch_cat->fetch();

            // echo $row['sub_cat_name'];
            echo "<form method='post'>
                        <table>
                            <tr>
                                <td>Select Main Category Name:</td>
                                <td>
                                    <select name='main_category'>
                                        <option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
                                        echo viewall_cat();
                                    echo"</select>
                                </td>
                            </tr>
                            <tr>
                                <td>Edit Sub Category Name:</td>
                                <td><Input type='text' name='up_sub_cat' value='".$row['sub_cat_name']."' /></td>
                            </tr>
                        </table>
                        <center><button name='edit_sub_cat'>Edit Sub Category</button></center>
                    </form>";

                    if(isset($_POST['edit_sub_cat'])){
                        $cat_name=$_POST['main_category'];
                        $sub_cat_name=$_POST['up_sub_cat'];

                        $update_cat=$con->prepare("UPDATE sub_cat SET sub_cat_name='$sub_cat_name', cat_id=$cat_name WHERE sub_cat_id='$sub_cat_id'");
                        
                        if($update_cat->execute()){
                            echo "<script>alert('Sub Category Updated Successfully !')</script>";
                            echo "<script>window.open('indexadmin.php?viewall_sub_cat', '_self')</script>";
                        }


                    }
        }
    }

    function edit_pro(){     //v17
        include("include/db.php");

        if(isset($_GET['edit_pro'])){
            $pro_id=$_GET['edit_pro'];

            $fetch_pro=$con->prepare("SELECT * FROM products WHERE pro_id='$pro_id'");
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();
            $row=$fetch_pro->fetch();

            $cat_id=$row['cat_id'];

            $fetch_cat=$con->prepare("SELECT * FROM main_category WHERE cat_id='$cat_id'");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat=$fetch_cat->fetch();
            //$cat_name=$row_cat['cat_name'];

            $sub_cat_id=$row['sub_cat_id'];

            $fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat WHERE sub_cat_id='$sub_cat_id'");
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
            $row_sub_cat=$fetch_sub_cat->fetch();
            //$sub_cat_name=$row_sub_cat['sub_cat_name'];

            echo "<form method='post' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Edit Product Name:</td>
                        <td><Input type='text' name='pro_name' value='".$row['pro_name']."' /></td>
                    </tr>
                    <tr>
                        <td>Select Category Name:</td>
                        <td>
                            <select name='cat_name'>
                                
                                "; echo viewall_cat(); echo"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Sub Category Name:</td>
                        <td>
                            <select name='sub_cat_name'>
                                <option value='".$row['cat_id']."'></option>
                                "; echo viewall_sub_cat(); echo"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Update Product Image 1:</td>
                        <td>
                            <Input type='file' name='pro_img1' />
                            <img src='../images/pro_img/".$row['pro_img1']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <tr>
                        <td>Update Product Image 2:</td>
                        <td>
                            <Input type='file' name='pro_img2' />
                            <img src='../images/pro_img/".$row['pro_img2']."' style='width:60px; height:60px' />
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Select Product Image 3:</td>
                        <td><Input type='file' name='pro_img3' /></td>
                    </tr>
                    <tr>
                        <td>Select Product Image 4:</td>
                        <td><Input type='file' name='pro_img4' /></td>
                    </tr> -->
        
                    <tr>
                        <td>Edit Description 1:</td>
                        <td><Input type='text' name='pro_feature1' value='".$row['pro_feature1']."' /></td>
                    </tr>
                    <tr>
                        <td>Edit Description 2:</td>
                        <td><Input type='text' name='pro_feature2' value='".$row['pro_feature2']."' /></td>
                    </tr>
                    <tr>
                        <td>Edit Description 3:</td>
                        <td><Input type='text' name='pro_feature3' value='".$row['pro_feature3']."' /></td>
                    </tr>
                    <!-- <tr>
                        <td>Enter Feature 4:</td>
                        <td><Input type='text' name='pro_feature4' /></td>
                    </tr>
                    <tr>
                        <td>Enter Feature 5:</td>
                        <td><Input type='text' name='pro_feature5' /></td>
                    </tr> -->
        
                    <tr>
                        <td>Update Price:</td>
                        <td><Input type='text' name='pro_price' value='".$row['pro_price']."' /></td>
                    </tr>
                    <!-- <tr>
                        <td>Enter Product ID:</td>
                        <td><Input type='text' name='pro_key' /></td>
                    </tr> -->
                    <tr>
                        <td>Edit Keyword:</td>
                        <td><Input type='text' name='pro_keyword' value='".$row['pro_keyword']."' /></td>
                    </tr>
        
                </table>
                <center><button name='edit_product'>Edit Product</button></center>
            </form>";
            //<option value='".$row['cat_id']."'></option> line 291 under select category name

            if(isset($_POST['edit_product'])){
                $pro_name=$_POST['pro_name'];
                $cat_id=$_POST['cat_name'];
                $sub_cat_id=$_POST['sub_cat_name'];  //v 18
                
                $pro_img1=$_FILES['pro_img1']['name'];
                $pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
    
                $pro_img2=$_FILES['pro_img2']['name'];
                $pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];
    
                move_uploaded_file($pro_img1_tmp, "../images/pro_img/$pro_img1");
                move_uploaded_file($pro_img2_tmp, "../images/pro_img/$pro_img2");
    
                $pro_feature1=$_POST['pro_feature1'];
                $pro_feature2=$_POST['pro_feature2'];
                $pro_feature3=$_POST['pro_feature3'];
    
                $pro_price=$_POST['pro_price'];
    
                $pro_keyword=$_POST['pro_keyword'];

                $edit_pro=$con->prepare("UPDATE products SET pro_name='$pro_name', cat_id='$cat_id', 
                                        sub_cat_id='$sub_cat_id', pro_img1='$pro_img1', pro_img2='$pro_img2', pro_feature1='$pro_feature1', pro_feature2='$pro_feature2', pro_feature3='$pro_feature3', 
                                        pro_price='$pro_price', pro_keyword='$pro_keyword' WHERE pro_id='$pro_id'");

                if($edit_pro->execute()){
                    echo "<script>alert('Product Updated Successfully !')</script>";
                    echo "<script>window.open('indexadmin.php?viewall_products', '_self')</script>";
                }
            }
        }
    }

    function delete_cat(){  //v19
        include("include/db.php");

        $delete_cat_id=$_GET['delete_cat'];

        $delete_cat=$con->prepare("DELETE FROM main_category WHERE cat_id='$delete_cat_id'");
            
        if($delete_cat->execute()){
            echo "<script>alert('Category Deleted Successfully !')</script>";
            echo "<script>window.open('indexadmin.php?viewall_cat', '_self')</script>";
        }
        
    }

    function delete_sub_cat(){   //v20
        include("include/db.php");

        $delete_sub_cat_id=$_GET['delete_sub_cat'];

        $delete_sub_cat=$con->prepare("DELETE FROM sub_cat WHERE sub_cat_id='$delete_sub_cat_id'");

        if($delete_sub_cat->execute()){
            echo "<script>alert('Sub Category Deleted Successfully !')</script>";
            echo "<script>window.open('indexadmin.php?viewall_sub_cat', '_self')</script>";
        }
    }

    function delete_product(){
        include("include/db.php");

        $delete_product_id=$_GET['delete_pro'];
        $delete_pro=$con->prepare("DELETE FROM products WHERE pro_id='$delete_product_id'");

        if($delete_pro->execute()){
            echo "<script>alert('Product Deleted Successfully !')</script>";
            echo "<script>window.open('indexadmin.php?viewall_products', '_self')</script>";
        }
    }
?>