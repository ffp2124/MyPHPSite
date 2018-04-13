<?php require'../Functions/checkadmin.php';?>
<?php 
define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
// create connection 
global $db;
	$sql = 'SELECT * FROM OrderItem ORDER BY OrderItemID';
	$result = $db->query($sql);
	$output[] = '<p><a href="AdminIndex.php?content_page=CreateOrderItem"><img src="../Images/btnCreate.jpg" /></a></p>';
	$output[] = '<h2 align="center">OrderItem Management</h2>';
	$output[] = '<table width="100%" border="1">';
	$output[] = '<tr><td align="center"><h3>OrderItemID</h3></td><td align="center"><h3>ShoeID</h3></td><td align="center"><h3>Quantity</h3></td><td align="center"><h3>Price</h3></td><td align="center"><h3>OrderID</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['OrderItemID'].'</td><td align="center">'.$row['ShoeID'].'</td><td align="center">'.$row['Quantity'].'</td><td align="center">'.$row['Price'].'</td><td align="center">'.$row['OrderID'].'</td></tr>';
	}
	$output[] = '</table>';
	echo join('',$output);  
?> 
