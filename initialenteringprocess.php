<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/16/17
 * Time: 5:10 PM
 */
require_once "dbaccess.php";

$employeeId = $_GET['eid'];


for ($i = 1; $i <= 3; $i++) {
    mysql_query("insert into checklist_enter values('','".$_GET['eid']."','".$i."','0');");
}

mysql_query("update employee set status = 'entering' where id = '".$employeeId."'");

?>


<meta http-equiv=refresh content="0.00005; url=hremployee.php">
