<div class="wrapper">
        <div class="header">
        </div>
        <div class="menu">
            <ul>
                <li class = "navigation_first_item">
                <li><a href="CustomerList.php">Customer</a></li>
                <li><a href="AdminIndex.php?content_page=Supplier">Supplier</a></li>
                <li><a href="Order.php">Order</a></li>
                <li><a href="AdminIndex.php?content_page=OrderItem">OrderItem</a></li>
                <li><a href="AdminIndex.php?content_page=Category">Category</a></li>
                <li><a href="AdminIndex.php?content_page=Shoe">Shoe</a></li>
                <li><a href="AdminIndex.php?content_page=adminlogout">Logout</a></li>
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
                    <td style="text-align: center">
                        @Copyright Quantity Shoes All Right Reserved</td>
                </tr>
            </table>
        </div>
    </div>
