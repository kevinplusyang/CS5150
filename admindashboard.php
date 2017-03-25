<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/15/17
 * Time: 11:57 PM
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
Staff in System:
<table border="solid 1px">
    <tr>
        <th>NetID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Department</th>
    </tr>
    <?php
    $staff_result = mysql_query("select * from staff;");
    while ($staff_row = mysql_fetch_array($staff_result)) {
        ?>
        <tr>
            <td>
                <?php echo $staff_row['netId'];?>
            </td>
            <td>
                <?php echo $staff_row['firstName'];?>
            </td>
            <td>
                <?php echo $staff_row['lastName'];?>
            </td>
            <td>
                <?php
                $department_result = mysql_query("select * from department where id = '".$staff_row['departmentId']."' ");
                $department_row = mysql_fetch_array($department_result);
                echo $department_row['name'];
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<br>

Create a new staff:
<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input placeholder="NetId" name="netId"><br>
    <input placeholder="First Name" name="firstName"><br>
    <input placeholder="Last Name" name="lastName"><br>
    <input type="password"placeholder="Password" name="password"><br>

    <select name="departmentId">
        <?php
        $department_result = mysql_query("select * from department; ");
        while ($department_row = mysql_fetch_array($department_result)){
            ?>
            <option value="<?php echo $department_row['id']?>"> <?php echo $department_row['name']?> </option>
            <?php
        }
        ?>
    </select><br>
    <button type="submit">Create staff</button>
</form>

</body>

<?php

if(isset($_POST['netId']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['departmentId'])){
    require_once "dbaccess.php";


    echo mysql_query("insert into staff values('','".$_POST['netId']."','".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['password']."','".$_POST['departmentId']."')");

    $index = "admindashboard.php";
    echo '<script language="javascript">';
    echo "window.location.href='$index';";
    echo '</script>';


}

?>




</html>
