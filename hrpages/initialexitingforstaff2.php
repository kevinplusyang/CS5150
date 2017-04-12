<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 4/11/17
 * Time: 1:53 PM
 */

require_once "../dbaccess.php";

$employeeId = $_GET['eid'];

echo $_POST['hr'];
echo $_POST['it'];
echo $_POST['fd'];
echo $_POST['sp'];


$checklist_result = mysql_query("select count(*) from checklist_exit_entry;");
$checklist_row = mysql_fetch_array($checklist_result);
$count = $checklist_row['count(*)'];

$checklist_result = mysql_query("select * from checklist_exit_entry;");
$i = 1;
while ($checklist_row =  mysql_fetch_array($checklist_result)) {
    if ($checklist_row['departmentId'] == 1) {
        mysql_query("insert into checklist_exit values('','".$_GET['eid']."','".$_POST['hr']."','".$i."','".$checklist_row['category']."','0');");
    } else if ($checklist_row['departmentId'] == 2) {
        mysql_query("insert into checklist_exit values('','".$_GET['eid']."','".$_POST['it']."','".$i."','".$checklist_row['category']."','0');");
    } else if ($checklist_row['departmentId'] == 3) {
        mysql_query("insert into checklist_exit values('','".$_GET['eid']."','".$_POST['fd']."','".$i."','".$checklist_row['category']."','0');");
    } else if ($checklist_row['departmentId'] == 4) {
        mysql_query("insert into checklist_exit values('','".$_GET['eid']."','".$_POST['sp']."','".$i."','".$checklist_row['category']."','0');");
    }


    $i++;
}




mysql_query("update employee set status = 'exitingInvisable' where id = '".$employeeId."'");

?>


<meta http-equiv=refresh content="0.00005; url=leaveemployee.php">
