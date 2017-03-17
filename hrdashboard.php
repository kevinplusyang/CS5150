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

<table border="solid 1px">
    <tr>
        <th>
            NetID
        </th>
        <th>
            First Name
        </th>
        <th>
            Last Name
        </th>
        <th>
            Supervisor
        </th>
        <th>
            Status
        </th>
        <th>
            Operation
        </th>
    </tr>
    <?php
        $employee_result = mysql_query("select * from employee;");
        while ($employee_row = mysql_fetch_array($employee_result)) {
            ?>
            <tr>
                <td>
                    <?php echo $employee_row['netId'];?>
                </td>
                <td>
                    <?php echo $employee_row['firstName'];?>
                </td>
                <td>
                    <?php echo $employee_row['lastName'];?>
                </td>
                <td>
                    <?php
//                        $supervisor_result = mysql_query("select * from supervise where employeeId = '".$employee_row['id']."'");
//                        $supervisor_row = mysql_fetch_array($supervisor_result);
//                        $supervisor_Id = $supervisor_row['supervisorId'];

                        $supervisor_Id = $employee_row['supervisorId'];

                        $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                        $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                        $supervisor_name = $supervisor_name_row['firstName'];
                        echo $supervisor_name;
                    ?>
                </td>
                <td>
                    <?php echo $employee_row['status'];?>
                </td>
                <td>
                    <?php
                        if ($employee_row['status'] == "created") {
                            ?>
                            <a href="initialenteringprocess.php?eid=<?php echo $employee_row['id']?>">Start Entering Process</a>
                            <?php
                        } else {
                            echo "Extering";
                        }
                    ?>

                </td>
            </tr>
            <?php
        }
    ?>
</table>


<br>
Create a new employee:
<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input placeholder="NetId" name="netId"><br>
    <input placeholder="First Name" name="firstName"><br>
    <input placeholder="Last Name" name="lastName"><br>
    <input type="password" placeholder="Password" name="password"><br>

    <select name="supervisor">
        <?php

        $supervisor_result = mysql_query("select * from staff where departmentId = 4;");
        while ($supervisor_row = mysql_fetch_array($supervisor_result)) {
            ?>
            <option value="<?php echo $supervisor_row['id']?>"> <?php echo $supervisor_row['firstName']?> </option>
            <?php
        }
        ?>
    </select><br>
    <button type="submit">Create Employee</button>
</form>

</body>

<?php

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['supervisor'])){
    require_once "dbaccess.php";

    echo mysql_query("insert into employee values('','','".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['password']."','created','".$_POST['supervisor']."')");

//    echo mysql_query("SELECT LAST_INSERT_ID() ;");
    $index = "hrdashboard.php";
    echo '<script language="javascript">';
    echo "window.location.href='$index';";
    echo '</script>';


}

?>



</body>
</html>
