    <div id="header">
        <div id="logo">
            <a href="indexuser.php"><img src="images/logo.png" alt="" /></a>
        </div> <!---End of logo--->

        <div id="link">
            <ul>
                <li><a href="#">Rate Us</li>
                <li><a href="#">Sign Up</li>
                <li><a href="#">Login</li>
            </ul>
        </div> <!---End f link--->

        <div id="search">
            <form action="search.php" method="get" enctype="multipart/form-data">
                <input type="text" name='user_input' placeholder="Search From Here....!">
                <button name='search' id="search_btn">Search</button>
                <button id="cart_btn"><a href='cart.php'>Cart <?php echo cart_count();?> </a></button>
            </form> 
        </div> <!----End of search---->
    </div> <!---End of header--->