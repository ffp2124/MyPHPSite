<?php 
require'../Functions/checkadmin.php';
require_once '../Functions/mysql.class.php';
require_once '../Functions/Functions.inc.php';
require("../Functions/ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>
<?php

global $editUrl;
$editUrl = "CustomerList.php";

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
        <form  id="pageForm" name="pageForm" method="post" action="CustomerList.php">
        <h2 align="center">Customer Management</h2>
            <?php 
// create connection 
global $db;
	$sql = 'SELECT * FROM Customer ORDER BY CustomerID';
	$result = $db->query($sql);
	$output[] = '<table width="100%" border="1">';
	$output[] = '<tr><td align="center"><h3>Update Status</h3></td><td align="center"><h3>CustomerID</h3></td><td align="center"><h3>UserName</h3></td><td align="center"><h3>Phone</h3></td><td align="center"><h3>Email</h3></td><td align="center"><h3>password</h3></td><td align="center"><h3>Address</h3></td><td align="center"><h3>FirstName</h3></td><td align="center"><h3>LastName</h3></td><td align="center"><h3>Status</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center"><a href="'.$editUrl.'?CustomerID='.$row['CustomerID'].'"><img src ="../Images/button_update.gif" /></a></td><td align="center">'.$row['CustomerID'].'</td><td align="center">'.$row['User_Name'].'</td><td align="center">'.$row['Phone_Number'].'</td><td align="center">'.$row['Email'].'</td><td align="center">'.$row['Password'].'</td><td align="center">'.$row['Address'].'</td><td align="center">'.$row['First_Name'].'</td><td align="center">'.$row['Last_Name'].'</td><td align="center">'.$row['Status'].'</td></tr>';
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
if(isset($_GET["CustomerID"])){
	$custId = $_GET["CustomerID"];
	$id = changeCust($custId);
	alertRedirect(true,'CustomerList.php');
}
?>