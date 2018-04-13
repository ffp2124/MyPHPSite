<?php require'../Functions/checkadmin.php';?>
<?php require_once '../Functions/mysql.class.php';?>
<?php require_once '../Functions/Functions.inc.php';?>
<?php
require("../Functions/ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>
<?php

global $editUrl;
$editUrl = "Order.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link href="../Styles/StyleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
        <form  id="orderpage" name="orderpage" method="post" action="Order.php">
        <h2 align="center">Order Management</h2>
<?php 
// create connection 
global $db;
	$sql = 'SELECT * FROM Orders ORDER BY OrderID';
	$result = $db->query($sql);
	$output[] = '<table width="100%" border="1">';
	$output[] = '<tr><td align="center"><h3>Change Status</h3></td><td align="center"><h3>OrderID</h3></td><td align="center"><h3>Status</h3></td><td align="center"><h3>OrderDate</h3></td><td align="center"><h3>CustomerID</h3></td><td align="center"><h3>Subtotal</h3></td><td align="center"><h3>GST</h3></td><td align="center"><h3>GrandTotal</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center"><a href="'.$editUrl.'?OrderID='.$row['OrderID'].'"><img src ="../Images/button_update.gif" /></a></td><td align="center">'.$row['OrderID'].'</td><td align="center">'.$row['Status'].'</td><td align="center">'.$row['OrderDate'].'</td><td align="center">'.$row['CustomerID'].'</td><td align="center">'.$row['Subtotal'].'</td><td align="center">'.$row['GST'].'</td><td align="center">'.$row['GrandTotal'].'</td></tr>';
	}
	$output[] = '</table>';
	echo join('',$output);  
?> 
</form>
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
</body>
</html>
<?php 
if(isset($_GET["OrderID"])){
	$orderId = $_GET["OrderID"];
	$id = changeOrder($orderId);
	alertRedirect(true,'Order.php');
	
	//alertRedirect(false,'CustomerList.php');
}
?>