<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
</head>

<body>
<h1 style="text-align:center;">
        Admin Login</h1>
<?php
session_start();
 global $msg;
$msg='';
if(isset($_POST["AdminLogin"])){
	if($_POST['username']=='Admin'&&$_POST['password']=='test'){
		$_SESSION['Admin'] = $_POST['username'];
		//Redirect("Admin/Customer.php");
		header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/Admin/CustomerList.php');
		}else{
			$msg = "<font color='red'>The user name or password is wrong !</font>";
			}
}
?>
<form method="post" id="Form" onSubmit="MM_validateForm('userName','','R','password','','R');return document.MM_returnValue">
<table  align="center">
<tr>
	<td></td>
    <td><span id="showSpan" ></span><?php echo $msg;?></td>
    <td></td>
</tr>
    <tr>
        <td>
            <strong>Username</strong></td>
        <td>
            
                <input type="text" id="userName" name="username" validate="required"  maxlength="50"/>
            
        </td>
        <td>
            <font color="red">*</font>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Password</strong></td>
        <td>
             <input type="password" id="password" name="password" validate="required"  maxlength="50"/>
        </td>
        <td>
            <font color="red">*</font>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
<input type="submit" id="AdminLogin" value="Login" name="AdminLogin" />
        </td>
        <td>
        </td>
    </tr>
</table>
</form>
</body>
</html>
