<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrater</title>
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
<?php
if(isset($_POST["btnRegister"])){
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$to = $email."";
	$subject = "Quantity Shoes Registration Confirm Message";
	$txt = "Welcome to our Web Stroe! Dear " . $userName . ":" . "\r\n";
	$txt .= "Congratulations! You have registered out website successfully! The following are your user information:". "\r\n";
	$txt .= "Your Username : ". $userName . "\r\n";
	$txt .= "Your Password : ". $password . "\r\n";
	$txt .= "Please remember your information, hope you have a pleasant trip in our web store!Thank you!";
	$headers = "From: webmaster@example.com";
	
	$mysqli = new mysqli("localhost", "fuf02", "18051989", "fuf02mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

	$sql = "INSERT INTO Customer (User_Name, Phone_Number, Email, Password, Address, First_Name, Last_Name, Status) VALUES ('$userName', '$phone', '$email', '$password', '$address', '$firstName', '$lastName', 'Enabled')";
	if (!$mysqli->query($sql)) {
    	echo "SQL operation failed: (" . $mysqli->errno . ")			 " . $mysqli->error;
		} 
	mail($to,$subject,$txt,$headers);
	header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/index.php?content_page=login');
	}
?>
<h1 style="text-align:center;">
        Registration</h1>
        <form method="post" class="form" id="Form1" >
        <table align="center" >
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                User Name:</td>
            <td >
                <input type="text" id="userName" name="userName" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Password:</td>
            <td>
                <input type="password" id="password" name="password" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Confirm Password:</td>
            <td>
                <input type="password" id="crmPwd" name="crmPwd" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                First Name:</td>
            <td>
                <input type="text" id="firstName" name="firstName" maxlength="50"/>
            </td>
            <td ></td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Last Name:</td>
            <td>
                 <input type="text" id="lastName" name="lastName"   maxlength="50"/>
            </td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Email:</td>
            <td>
                <input type="text" id="email" name="email" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Address:</td>
            <td>
                <input type="text" id="address" name="address" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font></td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Phone Number:</td>
            <td>
                <input type="text" id="phone" name="phone" required  maxlength="50"/>
            </td>
            <td>
                <font color="red">*</font></td>
        </tr>
        <tr>
            <td>&nbsp;
                </td>
            <td>
                <input name="btnRegister" type="submit" id="btnRegister" onClick="MM_validateForm('email','','NisEmail');return document.MM_returnValue" value="Register" />
            </td>
            <td>&nbsp;
                </td>
        </tr>
        <tr>
            <td >
            </td>
            <td ></td>
            <td></td>
        </tr>
    </table>
    </form>
</body>
</html>
