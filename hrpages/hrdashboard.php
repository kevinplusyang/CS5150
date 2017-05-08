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
        require_once '../outline/ExternalSidebarHr.php';
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
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <p>
                                Employees in system
                            </p>

                            <h2>
                                <?php
                                $number_result = mysql_query("select count(*) from employee;");
                                $number_row = mysql_fetch_array($number_result);
                                echo $number_row['count(*)'];
                                ?>

                            </h2>
                        </div>
                        <div class="icon">
                            <i class="fa fa-child"></i>
                        </div>
                        <a href="hremployee.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p>Supervisor in System</p>
                            <h2> <?php
                                $number_result = mysql_query("select count(*) from worksIn where departmentId = '4';");
                                $number_row = mysql_fetch_array($number_result);
                                echo $number_row['count(*)'];
                                ?></h2>


                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="hremployee.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>



                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <p>Onboarding employees</p>
                            <h2>
                                <?php
                                $number_result = mysql_query("select count(*) from employee where status = 'entering';");
                                $number_row = mysql_fetch_array($number_result);
                                echo $number_row['count(*)'];
                                ?>
                            </h2>


                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-log-in"></i>
                        </div>
                        <a href="hremployee.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <p>Offboarding employees</p>
                            <h2>
                                <?php
                                $number_result = mysql_query("select count(*) from employee where status = 'exitingVisable' or status = 'exitingInvisable';");
                                $number_row = mysql_fetch_array($number_result);
                                echo $number_row['count(*)'];
                                ?>
                            </h2>


                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-log-out"></i>
                        </div>
                        <a href="hremployee.php" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <div class="row">

                <a href="hrenroll.php">
                    <div class="col-md-6">
                        <div class="callout callout-info">
                            <h4>Enroll a new Employee</h4>

                            <p>Help a new employee finish onboarding process</p>
                        </div>
                    </div>
                </a>


                <a href="leaveemployee.php">
                    <div class="col-md-6">
                        <div class="callout callout-success">
                            <h4>Exit an employee</h4>

                            <p>Help a new employee finish offboarding process</p>
                        </div>
                    </div>
                </a>

            </div>
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
