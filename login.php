<?php
    ob_start(); //set buffer on
    session_start(); //starting session
	
   // include username and password array and the function
   require('Functions/UserDetails.php');
    
	// if the user has input username and password
	if (isset($_POST['form_username']) and isset($_POST['form_password']))
    {			
		//The login is not successful, set the login flag to false
	        $_SESSION['flag'] = false;
			
			// call the pre-defined function and check if user is authenticated
			if (checkUserCredentals($_POST['form_username'], $_POST['form_password']) == 1)
			{
			//The login is successful, set the login flag to true and save the current user name
		    $_SESSION['flag'] = true;
			$_SESSION['current_user'] = $_POST['form_username'];
					
			//redirect the user to the correct page
			ob_end_clean();
			
			//find out where to go after login
			if (isset($_SESSION['request_page']))
		    $redirect_page = "http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/index.php?content_page=".$_SESSION['request_page'];
			else
			$redirect_page = "http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/index.php?content_page=MyOrder";
				
            //redirect the user to the correct page after login
			header("Location: ".$redirect_page);
			}else if(checkUserCredentals($_POST['form_username'], $_POST['form_password']) == 2){//disabled
		$msg = "<font color='red'>Sorry, your account has been disabled !</font>";
	}else{//wrong username
		$msg = "<font color='red'>The user name or password is wrong !</font>";
	}
	} //Otherwise, stay in the login page
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

</head>

<body>
<h1 style="text-align:center;">
        Login</h1>
<form method="post" class="form" id="Form1" >
<table align="center">
	<tr>
    	<td></td>
        <td><span id="showSpan" ></span><?php echo $msg;?></td>
        <td></td>
    </tr>
    <tr>
        <td>
            <strong>Username</strong></td>
        <td>
            
                <input type="text" id="userName" name="form_username" required  maxlength="50"/>
            
        </td>
        <td>
            <font color="red">*</font>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Password</strong></td>
        <td>
             <input type="password" id="password" name="form_password" required  maxlength="50"/>
        </td>
        <td>
            <font color="red">*</font>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
<input type="submit" id="btnLogin" value="Login" name="btnLogin" />
        </td>
        <td>
        </td>
    </tr>
</table>
</form>
</body>
</html>
