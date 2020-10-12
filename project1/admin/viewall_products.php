<div class="scroll" id="bodyright"> <!---11--->
    <h3>Add New Product From Here</h3>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Product Images</th>
                <th>Description 1</th>
                <th>Description 2</th>
                <th>Description 3</th>
                <th>Price</th>
                <th>Keyword</th>
                <th>Added Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php include("include/function.php"); echo viewall_products();?>

        </table>
    </form>
</div>

