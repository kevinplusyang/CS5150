<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 8:50 PM
 */

session_start();
require_once "../dbaccess.php";
var_dump($_POST['hi']);

$checklist_result = mysql_query("select * from checklist_enter where employeeId = '".$_GET['eid']."' and category = '".$_GET['cid']."' ");
while ($checklist_row = mysql_fetch_array($checklist_result)) {
    if (in_array($checklist_row['entryId'], $_POST['hi'])) {
        mysql_query("update checklist_enter set status = 1 where entryId = '".$checklist_row['entryId']."' and employeeId = '".$_GET['eid']."' and category = '".$_GET['cid']."'; ");
    } else {
        mysql_query("update checklist_enter set status = 0 where entryId = '".$checklist_row['entryId']."' and employeeId = '".$_GET['eid']."' and category = '".$_GET['cid']."'; ");

    }
}

$checklist_result = mysql_query("select * from checklist_enter where employeeId = '".$_GET['eid']."' ");
$flag = 1;
while ($checklist_row = mysql_fetch_array($checklist_result)) {
    if ($checklist_row['status'] == 0) {
        $flag = 0;
    }
}
if ($flag == 1) {
    mysql_query("update employee set status = 'stable' where id = '".$_GET['eid']."' ;");
} else {
    mysql_query("update employee set status = 'entering' where id = '".$_GET['eid']."' ;");
}


?>

<meta http-equiv=refresh content="0.00005; url=viewdetails.php?eid=<?php echo $_GET['eid'];?>">
