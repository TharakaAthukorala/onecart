    <div id="bodyleft">
        <h3>Content Management</h3>
        <!-- <img src="images/slider/1.1.jpg" alt=""> -->
        <ul>
            <li><a href="indexadmin.php">Home</a></li>
            <li><a href="indexadmin.php?viewall_cat">View All Categories</a></li>
            <li><a href="indexadmin.php?viewall_sub_cat">View All Sub Categories</a></li>
            <li><a href="indexadmin.php?add_product">ADD New Products</a></li>
            <li><a href="indexadmin.php?viewall_products">View All Products</a></li>
        </ul>
    </div>

    <?php
        if(isset($_GET['viewall_cat'])){
            include("cat.php");
        }
        if(isset($_GET['viewall_sub_cat'])){
            include("sub_cat.php");
        }
        if(isset($_GET['viewall_products'])){
            include("viewall_products.php");
        }
        if(isset($_GET['add_product'])){
            include("add_product.php");
        }
    ?>