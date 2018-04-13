 <?php require'../Functions/checkadmin.php';?>
 <script type="text/javascript">
        
        function btnCancel_click(){
        	window.location.href = "AdminIndex.php?content_page=Shoe";
        }
        
    </script>
    <script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
    </script>
    
<form method="post" enctype="multipart/form-data" >
<table align="center">
  <tr>
    <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">Shoe Name:</td>
    <td><input name="shoeName" type="text" id="shoeName" size="35"></td>
    <td>
                <font color="red">*</font>
            </td>
  </tr>
  <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                CategoryID:</td>
            <td>
                <select id="selCategory" name="selCategory" style="width:170";>
                                    <?php 
									define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
                                    	global $db;
	$sql = 'SELECT CategoryID FROM Category ORDER BY CategoryID';
	$result = $db->query($sql);
	while ($row = $result->fetch()){
		echo("<option value = '" . $row['CategoryID'] . "'>" . $row['CategoryID'] . "</option>");
	}
                                    ?>
                                    </select>
                                    
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                SupplierID:</td>
            <td>
                <select id="selSupplier" name="selSupplier" style="width:170";>
                                    <?php 
										define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
                                    	global $db;
	$sql = 'select SupplierID from Supplier ORDER BY SupplierID';
	$result = $db->query($sql);
	while ($row = $result->fetch()){
		echo("<option value = '" . $row['SupplierID'] . "'>" . $row['SupplierID'] . "</option>");
	}
                                    ?>
                                    </select>
                                    
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Price:</td>
            <td>
                <input type="text" id="price" name="price" size="35"/>
            </td>
            <td ><font color="red">*</font></td>
        </tr>
  <tr>
    <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">Image:</td>
    <td><input type="File" required name="file" value="" size="30"></td>
  </tr>
  <tr>
    <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">Description:</td>
    <td><textarea name="description" cols="35" rows="4" id="description"></textarea></td>
    <td>
                <font color="red">*</font>
            </td>
  </tr>
    <tr>
    <td ></td>
    <td ><input name="submit" type="Submit" onClick="MM_validateForm('shoeName','','R','price','','RisNum','description','','R');return document.MM_returnValue" value="Save"> &nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;<input type="button" name="Cancel" value="Cancel" onclick="btnCancel_click()"></td>
  </tr>
</table>
</form>
<?php
if (isset($_FILES["file"]) && ($_FILES["file"]["error"] > 0))
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
elseif (isset($_FILES["file"]))
  {
	  
  move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/PHPUploaded/" . $_FILES["file"]["name"]); //Save the file as the supplied name
  $shoeName = $_POST['shoeName'];
  $categoryid = $_POST['selCategory'];
  $supplierid = $_POST['selSupplier'];
  $price = $_POST['price'];
  //$image = $_FILES["icon_file"]["name"];
  $desc = $_POST['description'];
  
  $mysqli = new mysqli("localhost", "fuf02", "18051989", "fuf02mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  $sql = "INSERT INTO Shoe (Shoe_Name, CategoryID, SupplierID, price, Image, Description) VALUES ('$shoeName', '$categoryid', '$supplierid', '$price', '".$_FILES['file']['name']."', '$desc')";
  if (!$mysqli->query($sql)) {
    	echo "SQL operation failed: (" . $mysqli->errno . ")			 " . $mysqli->error;
		}
  }
?>
