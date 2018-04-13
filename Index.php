<?php
require("Functions/ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
//Retrieve the requested content page name and construct the file name
if (isset($_GET['content_page']))
{
   $page_name = $_GET['content_page'];
   $page_content = $page_name.'.php';
}
elseif (isset($_POST['content_page']))
{
   $page_name = $_POST['content_page'];
   $page_content = $page_name.'.php';
}
else
{$page_content = 'IndexContent.php';}

//This must be below the setting of $page_content 
include('mainMaster.php');
?>
</body>
</html>
