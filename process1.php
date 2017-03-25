<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 8:50 PM
 */

session_start();
require_once "dbaccess.php";
var_dump($_POST['hi']);

$array;
$i = 0;
$checklist_result = mysql_query("select * from checklist_enter_entry;");
while ($checklist_row = mysql_fetch_array($checklist_result)) {
    $array[$i] = 0;
    $i++;
}
$array[$i] = 0;

for ($i = 0; $i < sizeof($_POST['hi']);$i++) {
    $array[$_POST['hi'][$i]] = 1;
}

var_dump($array);

$checklist_result = mysql_query("select * from checklist_enter_entry;");
$i = 1;
while ($checklist_row = mysql_fetch_array($checklist_result)) {
    mysql_query("update checklist_enter set status = '".$array[$i]."' where entryId = '".$i."' and employeeId = '".$_GET['eid']."'; ");
    $i++;
}

?>

<meta http-equiv=refresh content="0.00005; url=staffdashboard.php">
