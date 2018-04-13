<?php require'../Functions/checkadmin.php';?>
<?php 
define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
// create connection 
global $db;
	$sql = 'SELECT * FROM Category ORDER BY CategoryID';
	$result = $db->query($sql);
	$output[] = '<p><a href="AdminIndex.php?content_page=CreateCategory"><img src="../Images/btnCreate.jpg" /></a></p>';
	$output[] = '<h2 align="center">Category Management</h2>';
	$output[] = '<table align="center" width="300" border="1">';
	$output[] = '<tr><td align="center"><h3>CategoryID</h3></td><td align="center"><h3>Category</h3></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['CategoryID'].'</td><td align="center">'.$row['Category'].'</td></tr>';
	}
	$output[] = '</table>';
	echo join('',$output);  
?> 

