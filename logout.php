<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 5/4/17
 * Time: 2:07 PM
 */

session_start();


unset($_SESSION['id']);
unset($_SESSION['netId']);
unset($_SESSION['firstName']);
unset($_SESSION['lastName']);
unset($_SESSION['userId']);
unset( $_SESSION['departmentId']);

?>
<meta http-equiv=refresh content="0.00005; url=index.php">