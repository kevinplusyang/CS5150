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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
<!--            <div class="row">-->
<!--                <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                    <div class="info-box">-->
<!--                        <span class="info-box-icon bg-aqua"><i class="fa fa-child"></i></span>-->
<!---->
<!--                        <div class="info-box-content">-->
<!--                            <span class="info-box-text">Employees in System</span>-->
<!--                            <span class="info-box-number">-->
<!--                                --><?php
//                                $number_result = mysql_query("select count(*) from employee;");
//                                $number_row = mysql_fetch_array($number_result);
//                                echo $number_row['count(*)'];
//                                ?>
<!--                            </span>-->
<!--                        </div>-->
<!--                        <!-- /.info-box-content -->-->
<!--                    </div>-->
<!--                    <!-- /.info-box -->-->
<!--                </div>-->
<!--                <!-- /.col -->-->
<!--                <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                    <div class="info-box">-->
<!--                        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>-->
<!---->
<!--                        <div class="info-box-content">-->
<!--                            <span class="info-box-text">Supervisors in System</span>-->
<!--                            <span class="info-box-number">-->
<!--                                --><?php
//                                $number_result = mysql_query("select count(*) from staff where departmentId = '4';");
//                                $number_row = mysql_fetch_array($number_result);
//                                echo $number_row['count(*)'];
//                                ?>
<!--                            </span>-->
<!--                        </div>-->
<!--                        <!-- /.info-box-content -->-->
<!--                    </div>-->
<!--                    <!-- /.info-box -->-->
<!--                </div>-->
<!--                <!-- /.col -->-->
<!---->
<!--                <!-- fix for small devices only -->-->
<!--                <div class="clearfix visible-sm-block"></div>-->
<!---->
<!--                <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                    <div class="info-box">-->
<!--                        <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-log-in"></i></span>-->
<!---->
<!--                        <div class="info-box-content">-->
<!--                            <span class="info-box-text">Entering Employees</span>-->
<!--                            <span class="info-box-number">-->
<!--                               --><?php
//                               $number_result = mysql_query("select count(*) from employee where status = 'entering';");
//                               $number_row = mysql_fetch_array($number_result);
//                               echo $number_row['count(*)'];
//                               ?>
<!--                            </span>-->
<!--                        </div>-->
<!--                        <!-- /.info-box-content -->-->
<!--                    </div>-->
<!--                    <!-- /.info-box -->-->
<!--                </div>-->
<!--                <!-- /.col -->-->
<!--                <div class="col-md-3 col-sm-6 col-xs-12">-->
<!--                    <div class="info-box">-->
<!--                        <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-log-out"></i></span>-->
<!---->
<!--                        <div class="info-box-content">-->
<!--                            <span class="info-box-text">Exiting Employees</span>-->
<!--                            <span class="info-box-number">-->
<!--                                --><?php
//                                $number_result = mysql_query("select count(*) from staff where departmentId = '4';");
//                                $number_row = mysql_fetch_array($number_result);
//                                echo $number_row['count(*)'];
//                                ?>
<!--                            </span>-->
<!--                        </div>-->
<!--                        <!-- /.info-box-content -->-->
<!--                    </div>-->
<!--                    <!-- /.info-box -->-->
<!--                </div>-->
<!--                <!-- /.col -->-->
<!--            </div>-->
            <!-- /.row -->
        </section>
        <!-- /.content -->
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
