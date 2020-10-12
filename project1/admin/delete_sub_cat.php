<?php
    include("include/function.php");
    if(isset($_GET['delete_sub_cat'])){
        echo delete_sub_cat();
    }
?>