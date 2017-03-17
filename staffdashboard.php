<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 1:03 AM
 */
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
<?php
    echo $_SESSION['$departmentId'];
    echo $_SESSION['id'];
    ?>
    My Staff:
    <table border="solid 1px">
        <tr>
            <th>
                First Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Operation
            </th>
        </tr>
        <?php
            $employee_result = mysql_query("select * from employee where supervisorId = '".$_SESSION['id']."'");
            while ($employee_row = mysql_fetch_array($employee_result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $employee_row['firstName']?>
                    </td>
                    <td>
                        <?php echo $employee_row['lastName']?>
                    </td>
                    <td>
                        <?php echo $employee_row['id']?>
                        <a href="supervisorviewemployee.php?eid=<?php echo $employee_row['id']?>">View Detail</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <?php
?>
</body>
</html>
