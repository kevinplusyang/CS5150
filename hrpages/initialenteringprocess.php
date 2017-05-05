<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 5:10 PM
 */
require_once "../dbaccess.php";

$employeeId = $_GET['eid'];

$checklist_result = mysql_query("select count(*) from checklist_enter_entry;");
$checklist_row = mysql_fetch_array($checklist_result);
$count = $checklist_row['count(*)'];

$checklist_result = mysql_query("select * from checklist_enter_entry;");
$i = 1;
while ($checklist_row =  mysql_fetch_array($checklist_result)) {
    mysql_query("insert into checklist_enter values('','".$_GET['eid']."','".$i."','".$checklist_row['category']."', '".$checklist_row['departmentId']."' ,'0');");
    $i++;
}


mysql_query("update employee set status = 'entering' where id = '".$employeeId."'");

?>


<meta http-equiv=refresh content="0.00005; url=hremployee.php">
