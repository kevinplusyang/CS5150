<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/25/17
 * Time: 11:17 AM
 */
?>

<!DOCTYPE html>
<html>
<?php
require_once '../outline/ExternalHead.php';
session_start();
require_once "../dbaccess.php";
?>
<body class="hold-transition skin-red sidebar-mini">

<div class="wrapper">


    <!--    Include Navigation Bar and Side Bar-->
    <?php
    require_once '../outline/ExternalHeader.php';
    require_once '../outline/ExternalSidebarStaff.php';
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <?php
            $result = mysql_query("select * from department where id = '".$_GET['did']."'");
            $row = mysql_fetch_array($result);
            $department = $row['name'];
            ?>
            <h1>
                View Employee Status as <?php echo $department;?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-toggle-right"></i> Home</a></li>
                <li class="active">Employee Status</li>
            </ol>
        </section>




        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <div class="box">

                        <?php
                            if ($_GET['did'] == 4) {
                                ?>
                                <div class="box-header">

                                    <?php
                                    $result = mysql_query("select * from employee where id = '".$_GET['eid']."' ");
                                    $row = mysql_fetch_array($result);
                                    $employeeName = $row['firstName'];
                                    ?>
                                    <h3 class="box-title"><?php echo $employeeName?></h3>


                                    <section class="content">
                                        <!-- Info boxes -->
                                        <div class="row">
                                            <div class="col-md-12">

                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 1");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '1' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Prior to Arrival Checklist

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Prior to Arrival Checklist

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                             Prior to Arrival Checklist

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>



                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 2");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '2' and status = 1 and employeeId = '".$_GET['eid']."' ");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Day

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                           First Day

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Day

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>


                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 3");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '3' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Week

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Week

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                             First Week

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>


                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 4");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '4' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            First Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                             First Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>


                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 5");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '5' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Second Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Second Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                             Second Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>


                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 6");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '6' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Third Month (New Hire’s First 90 Days) and Sixth Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Third Month (New Hire’s First 90 Days) and Sixth Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                             Third Month (New Hire’s First 90 Days) and Sixth Month

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>



                                                <?php
                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = 7");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '7' and status = 1  and employeeId = '".$_GET['eid']."'");
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];

                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Longer-Term Retention Tactics

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 0%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        0%
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Longer-Term Retention Tactics

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                        Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Longer-Term Retention Tactics

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                                ?>


                                            </div>

                                        </div>
                                    </section>

                                </div>
                                <?php
                            }
                            else {



                                ?>
                            <div class="box-header">

                                <?php
                                $result = mysql_query("select * from employee where id = '".$_GET['eid']."' ");
                                $row = mysql_fetch_array($result);
                                $employeeName = $row['firstName'];
                                ?>
                                <h3 class="box-title"><?php echo $employeeName?></h3>


                                <section class="content">
                                    <!-- Info boxes -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php

                                            $result = mysql_query("select distinct category from checklist_enter_entry where departmentId = '".$_GET['did']."' ");
                                            while ($row = mysql_fetch_array($result)) {

                                                $total_result = mysql_query("select count(*) from checklist_enter_entry where category = '".$row['category']."' and departmentId = '".$_GET['did']."' ");
                                                $total_row = mysql_fetch_array($total_result);
                                                $total = $total_row['count(*)'];

                                                $finish_result = mysql_query("select count(*) from checklist_enter where category = '".$row['category']."' and status = 1  and employeeId = '".$_GET['eid']."' and departmentId = '".$_GET['did']."'") ;
                                                $finish_row = mysql_fetch_array($finish_result);
                                                $finish = $finish_row['count(*)'];


                                                if ($finish == 0) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=<?php echo $row['category'];?>&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-red">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Category <?php echo $row['category']?>

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php

                                                } else if ($finish == $total) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=<?php echo $row['category'];?>&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-green">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Category <?php echo $row['category']?>

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=<?php echo $row['category'];?>&did=<?php echo $_GET['did']?>">
                                                            <div class="info-box bg-yellow">
                                                                <span class="info-box-icon"><i class="glyphicon glyphicon-pencil"></i></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text"><?php echo $finish;?> / <?Php echo $total;?></span>
                                                                    <span class="info-box-number">
                                                            Category <?php echo $row['category']?>

                                                        </span>

                                                                    <div class="progress">
                                                                        <div class="progress-bar" style="width: <?php echo $finish / $total * 100;?>%"></div>
                                                                    </div>
                                                                    <span class="progress-description">
                                                         <?php echo number_format($finish / $total * 100, 2, '.', '');?>% Finished
                                                    </span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }



                                                ?>


                                                <?php
                                            }
                            }

                                            ?>

                                        </div>
                                    </div>
                                </section>

                            </div>







                        <!-- /.box-header -->


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>


    </div>
    <!-- /.content-wrapper -->



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Cornell University</b>
        </div>
        <strong>Cornell IPP. Front-end powered by Almsaeed Studio.</strong>
    </footer>


</div>
<!-- ./wrapper -->

<?php
require_once '../outline/ExternalFoot.php';
?>
</body>
</html>
