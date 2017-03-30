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
            <h1>
                Employee Status
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
                        <div class="box-header">
                            <h3 class="box-title">All Employees</h3>


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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=1">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=2">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=3">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=4">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=5">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=6">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7">
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
                                                <a href="staffchecklist.php?eid=<?php echo $_GET['eid']?>&cid=7">
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
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<?php
require_once '../outline/ExternalFoot.php';
?>
</body>
</html>
