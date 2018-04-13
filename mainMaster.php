
<div class="wrapper">
        <div class="header">
        <a href="index.php?content_page=IndexContent""><img src="Images/logo1.png" height="200" width = "308"/></a><img src="Images/SlideShow/1.jpg" Height = "200" width = "610"/>
        </div>
        <div class="menu">
            <ul>
                <li class = "navigation_first_item">
                    <a href="index.php?content_page=IndexContent">Home</a></li>
                <li><a href="index.php?content_page=Registration">Registration</a></li>
                <li><a href="index.php?content_page=login">Login</a></li>
                <li><a href="index.php?content_page=Catalogue">Catalogue</a></li>
                <li><a href="index.php?content_page=AdminLogin">Admin</a></li>
                <li><a href="ShoppingCart.php">Shopping Cart</a></li>
                <li><a href="index.php?content_page=MyOrder">My Order</a></li>
                <li><a href="index.php?content_page=ContactUs">Contact us</a></li>
                <li><a href="index.php?content_page=logout">Logout</a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="content">
            <?php include($page_content);?>
        </div>
        <div class="clear">
        </div>
        <div class = "footer">

            <table style = "width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <a href="index.php?content_page=IndexContent" style="font-size: medium;">Home </a> &nbsp;|&nbsp;
                        <a href="index.php?content_page=Registration" style="font-size: medium;">Registration  </a>&nbsp; |&nbsp;
                        <a href="index.php?content_page=ContactUs" style="font-size: medium;">Contact us </a> &nbsp;|&nbsp;
                        <a href="index.php?content_page=AdminLogin" style="font-size: medium;">Admin </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        @Copyright Quantity Shoes All Right Reserved</td>
                </tr>
            </table>
        </div>
    </div>
