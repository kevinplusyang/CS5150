<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 8:17 PM
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
        $employee_result = mysql_query("select * from employee where id = '".$_GET['eid']."'");
        $employee_row = mysql_fetch_array($employee_result);
        ?>
    Name: <?php
        echo $employee_row['firstName'];
        echo " ";
        echo $employee_row['lastName'];
?>
    <br>

    <form action="process1.php?eid=<?php echo $_GET['eid'];?>" method="post">
        <?

        $checklist_result = mysql_query("select * from checklist_enter_entry;");
        while ($checklist_row = mysql_fetch_array($checklist_result)) {
            $checked_result = mysql_query("select * from checklist_enter where employeeId = '".$_GET['eid']."' and entryId = '".$checklist_row['id']."' ");
            $checked_row = mysql_fetch_array($checked_result);
            if ($checked_row['status'] == 0) {
                ?>
                <input type="checkbox" name="hi[]" value="<?php echo $checklist_row['id'];?>"><?php echo $checklist_row['id'];?><?php echo $checklist_row['content'];?><br>
                <?php
            } else {
                ?>
                <input type="checkbox" checked name="hi[]" value="<?php echo $checklist_row['id'];?>"><?php echo $checklist_row['id'];?><?php echo $checklist_row['content'];?><br>
                <?php
            }

        }
        ?>
        <input type="submit" value="Submit">
    </form>

</body>
</html>
