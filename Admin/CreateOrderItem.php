 <?php require'../Functions/checkadmin.php';?>
 <?php
if(isset($_POST['Save'])){
	
  $shoeid = $_POST['selShoeid'];
  $qty = $_POST['quantity'];
  $orderid = $_POST['selOrder'];
  $price = $_POST['price'];
  
  $mysqli = new mysqli("localhost", "fuf02", "18051989", "fuf02mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  $sql = "INSERT INTO OrderItem (ShoeID, Quantity,  Price, OrderID) VALUES ('$shoeid', '$qty','$price',  '$orderid')";
  if (!$mysqli->query($sql)) {
    	echo "SQL operation failed: (" . $mysqli->errno . ")			 " . $mysqli->error;
		}
		header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/Admin/AdminIndex.php?content_page=OrderItem');
}
if(isset($_POST['btnCancel'])){
		header('Location: http://hyperdisc.unitec.ac.nz/fuf02/php_assignment/Admin/AdminIndex.php?content_page=OrderItem');
	}
?>
<form method="post" class="neworder" id="neworder">
        <table align="center" >
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Shoe ID:</td>
            <td >
                <select id="selShoeid" name="selShoeid" style="width:170";>
                                    <?php 
									define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
                                    	global $db;
	$sql = 'SELECT id FROM Shoe ORDER BY id';
	$result = $db->query($sql);
	while ($row = $result->fetch()){
		echo("<option value = '" . $row['id'] . "'>" . $row['id'] . "</option>");
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
                Quantity:</td>
            <td>
                <input type="text" id="quantity" name="quantity" maxlength="50"/>
                                    
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
                <input type="text" id="price" name="price" maxlength="50"/>
            </td>
            <td ><font color="red">*</font></td>
        </tr>
        <tr>
            <td style="text-align: right;
        font-family: Arial, Helvetica, sans-serif;">
                Order ID:</td>
            <td>
                 <select id="selOrder" name="selOrder" style="width:170";>
                                    <?php 
									define("APP_ROOT", $_SERVER['DOCUMENT_ROOT'] . "\\fuf02\\php_assignment\\");
require_once(APP_ROOT.'Functions/mysql.class.php');
                                    	global $db;
	$sql = 'SELECT OrderID FROM Orders ORDER BY OrderID';
	$result = $db->query($sql);
	while ($row = $result->fetch()){
		echo("<option value = '" . $row['OrderID'] . "'>" . $row['OrderID'] . "</option>");
	}
                                    ?>
                                    </select>
            </td>
            <td><font color="red">*</font></td>
        </tr>
       
        <tr>
            <td>&nbsp;
                </td>
            <td>
                <input name="Save" type="submit" id="Save" value="Save"/>
              <input type="submit" id="btnCancel" value="Cancel" name="btnCancel" />
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