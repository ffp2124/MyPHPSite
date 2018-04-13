<?php require'../Functions/checkadmin.php';?>
<?php
global $db;
	if(isset($_POST['Submit'])){
		$save = $_POST['Category'];
		
		$mysqli = new mysqli("localhost", "fuf02", "18051989", "fuf02mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql = "INSERT INTO Category(Category) VALUES ('$save')";
	if (!$mysqli->query($sql)) {
    	echo "SQL operation failed: (" . $mysqli->errno . ")			 " . $mysqli->error;
		}
		header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/Admin/AdminIndex.php?content_page=Category');
		}
	if(isset($_POST['Cancel'])){
		header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/Admin/AdminIndex.php?content_page=Category');
	}
?>
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


<form method="post" id="editForm"  >
<table class="style2" align="center">
    <tr>
        <td class="style3">
            <strong>Category:</strong></td>
        <td class="style9">
            
                <input type="text" id="Category" name="Category"  maxlength="50"/>
            
        </td>
        <td class="style10">
            <font color="red">*</font>
        </td>
    </tr>
   
    <tr>
        <td class="style4">
        
        </td>
        <td class="style5">
        <input name="Submit" type="submit" id="Submit" onClick="MM_validateForm('Category','','R');return document.MM_returnValue"  value="Submit" />
<input type="submit" value="Cancel" id="Cancel" name="Cancel" />
        </td>
        <td class="style11">
        </td>
    </tr>
</table>
</form>