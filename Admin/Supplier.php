<?php require'../Functions/checkadmin.php';?>
<?php 
define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
// create connection 
global $db;
	$sql = 'SELECT * FROM Supplier ORDER BY SupplierID';
	$result = $db->query($sql);
	$output[] = '<h2 align="center">Supplier Management</h2>';
	$output[] = '<table width="100%" border="1">';
	$output[] = '<tr><td align="center"><h3>SupplierID</h3></td><td align="center"><h3>Supplier Name</h3></td><td align="center"><h3>Phone Number</h3></td><td align="center"><h3>Address</h3></td><td align="center"><h3>Email</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['SupplierID'].'</td><td align="center">'.$row['Supplier_Name'].'</td><td align="center">'.$row['Phone_Number'].'</td><td align="center">'.$row['Address'].'</td><td align="center">'.$row['Email'].'</td></tr>';
	}
	$output[] = '</table>';
	echo join('',$output);  
?> 
