<?php require'../Functions/checkadmin.php';?>
<?php 
define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
// create connection 
global $db;
	$sql = 'SELECT * FROM Shoe ORDER BY id';
	$result = $db->query($sql);
	$output[] = '<p><a href="AdminIndex.php?content_page=CreateShoeItem"><img src="../Images/btnCreate.jpg" /></a></p>';
	$output[] = '<h2 align="center">Shoe Management</h2>';
	$output[] = '<table width="100%" border="1">';
	$output[] = '<tr><td align="center"><h3>id</h3></td><td align="center"><h3>Shoe Name</h3></td><td align="center"><h3>CategoryID</h3></td><td align="center"><h3>SupplierID</h3></td><td align="center"><h3>price</h3></td><td align="center"><h3>Description</h3></td><td align="center"><h3>Image</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['id'].'</td><td align="center">'.$row['Shoe_Name'].'</td><td align="center">'.$row['CategoryID'].'</td><td align="center">'.$row['SupplierID'].'</td><td align="center">'.$row['price'].'</td><td align="center">'.$row['Description'].'</td><td align="center"><img height="60" width="60" src="../../uploads/PHPUploaded/'.$row['Image'].'"/></td></tr>';
	}
	$output[] = '</table>';
	echo join('',$output);  
?> 