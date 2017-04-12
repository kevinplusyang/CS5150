<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/14/17
 * Time: 9:44 PM
 */

require_once "dbaccess.php";
?>


<!DOCTYPE html>
<html>
<?php
session_start();
require_once "dbaccess.php";
?>
<head>
    <meta charset="utf-8">
    <title>IPP</title>
</head>
<body>


Staff/Employee Login (Will be altered by Cornell Login Protocol)
<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input placeholder="NetId" name="SnetId">
    <input type="password"placeholder="Password" name="Spassword">
    <button type="submit">Login</button>
</form>


<br>
<hr>
System Admin Login
<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input placeholder="NetId" name="netId">
    <input type="password"placeholder="Password" name="password">
    <button type="submit">Login</button>
</form>



</body>

<?php
if(isset($_POST['SnetId']) && isset($_POST['Spassword'])){
    require_once "dbaccess.php";

    $sql_count = "select count(*) from staff where netId = '".$_POST['SnetId']."' and password='".$_POST['Spassword']."' ";
    $result_count = mysql_query($sql_count);
    $row_count = mysql_fetch_array( $result_count );
    if($row_count[0]==0) {
        $alertText = "Wrong Password or User Doesn't Exist";
        echo '<script language="javascript">';
        echo "alert('$alertText');";
        echo "window.location.href='".$_SERVER['PHP_SELF']."';";
        echo '</script>';
    }else{
        $result = mysql_query("select * from staff where netId = '".$_POST['SnetId']."' and password= '".$_POST['Spassword']."' ");
        $row = mysql_fetch_array($result);

        $netId = $row['netId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $userId = $row['id'];
        $departmentId = $row['departmentId'];

        $_SESSION['id'] = $row['id'];
        $_SESSION['netId'] = $netId;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['userId'] = $userId;
        $_SESSION['$departmentId'] = $departmentId;
        echo isset($_SESSION['netId']);

        if ($departmentId == 1) {
            $index = "hrpages/hrdashboard.php";
            echo '<script language="javascript">';
            echo "window.location.href='$index';";
            echo '</script>';
        } else if ($departmentId == 10) {
            $index = "employeedashboard.php";
            echo '<script language="javascript">';
            echo "window.location.href='$index';";
            echo '</script>';
        } else {
            $index = "staffpages/staffdashboard.php";
            echo '<script language="javascript">';
            echo "window.location.href='$index';";
            echo '</script>';
        }


    }

    $sql_count = "select count(*) from employee where netId = '".$_POST['SnetId']."' and password='".$_POST['Spassword']."' ";
    $result_count = mysql_query($sql_count);
    $row_count = mysql_fetch_array( $result_count );
    if($row_count[0]==0) {
        $alertText = "Wrong Password or User Doesn't Exist";
        echo '<script language="javascript">';
        echo "alert('$alertText');";
        echo "window.location.href='".$_SERVER['PHP_SELF']."';";
        echo '</script>';
    }else{
        $result = mysql_query("select * from employee where netId = '".$_POST['SnetId']."' and password= '".$_POST['Spassword']."' ");
        $row = mysql_fetch_array($result);

        $netId = $row['netId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $userId = $row['id'];
        $departmentId = $row['departmentId'];

        $_SESSION['id'] = $row['id'];
        $_SESSION['netId'] = $netId;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;


        echo isset($_SESSION['netId']);

        $index = "employeepages/employeedashboard.php";
        echo '<script language="javascript">';
        echo "window.location.href='$index';";
        echo '</script>';


    }


}
?>



<?php
if(isset($_POST['netId']) && isset($_POST['password'])){
    require_once "dbaccess.php";

    $sql_count = "select count(*) from user where netId = '".$_POST['netId']."' and password='".$_POST['password']."' ";
    $result_count = mysql_query($sql_count);
    $row_count = mysql_fetch_array( $result_count );
    if($row_count[0]==0) {
        $alertText = "Wrong Password or User Doesn't Exist";
        echo '<script language="javascript">';
        echo "alert('$alertText');";
        echo "window.location.href='".$_SERVER['PHP_SELF']."';";
        echo '</script>';
    }else{
        $result = mysql_query("select * from user where netId = '".$_POST['netId']."' and password= '".$_POST['password']."' ");
        $row = mysql_fetch_array($result);

        $netId = $row['netId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $userId = $row['id'];

        $_SESSION['netId'] = $netId;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['userId'] = $userId;
        echo isset($_SESSION['netId']);


        $index = "admindashboard.php";
        echo '<script language="javascript">';
        echo "window.location.href='$index';";
        echo '</script>';
    }
}
?>
</html>
