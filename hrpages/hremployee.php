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
                            <h3 class="box-title">Just Created Employees (Needs to start entering process)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>NetID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                <?php
                                $employee_result = mysql_query("select * from employee where status = 'created';");
                                while ($employee_row = mysql_fetch_array($employee_result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employee_row['netId'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['lastName'];?>
                                        </td>
                                        <td>
                                            <?php
                                            $supervisor_Id = $employee_row['supervisorId'];
                                            $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                                            $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                                            $supervisor_name = $supervisor_name_row['firstName'];
                                            echo $supervisor_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "entering") {
                                                ?>
                                                <span class="label label-warning">In Entering Process</span>
                                                <?php
                                            } elseif ($employee_row['status'] == "created") {
                                                ?>
                                                <span class="label label-info">Just Created (Need to Start Entering Process)</span>
                                                <?php
                                            }  elseif ($employee_row['status'] == "stable") {
                                                ?>
                                                <span class="label label-success">Stable</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Aware</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Doesn't Aware</span>
                                                <?php

                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "created") {
                                                ?>

                                                <button onclick="location.href='initialenteringprocess.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Entering Process</button>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">In Entering Process Employees</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>NetID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                <?php
                                $employee_result = mysql_query("select * from employee where status = 'entering';");
                                while ($employee_row = mysql_fetch_array($employee_result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employee_row['netId'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['lastName'];?>
                                        </td>
                                        <td>
                                            <?php
                                            $supervisor_Id = $employee_row['supervisorId'];
                                            $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                                            $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                                            $supervisor_name = $supervisor_name_row['firstName'];
                                            echo $supervisor_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "entering") {
                                                ?>
                                                <span class="label label-warning">In Entering Process</span>
                                                <?php
                                            } elseif ($employee_row['status'] == "created") {
                                                ?>
                                                <span class="label label-info">Just Created (Need to Start Entering Process)</span>
                                                <?php
                                            }  elseif ($employee_row['status'] == "stable") {
                                                ?>
                                                <span class="label label-success">Stable</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Aware</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Doesn't Aware</span>
                                                <?php

                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "created") {
                                                ?>

                                                <button onclick="location.href='initialenteringprocess.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Entering Process</button>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Stable Employees (All entering process has been finished)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>NetID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                <?php
                                $employee_result = mysql_query("select * from employee where status = 'stable' ;");
                                while ($employee_row = mysql_fetch_array($employee_result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employee_row['netId'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['lastName'];?>
                                        </td>
                                        <td>
                                            <?php
                                            $supervisor_Id = $employee_row['supervisorId'];
                                            $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                                            $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                                            $supervisor_name = $supervisor_name_row['firstName'];
                                            echo $supervisor_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "entering") {
                                                ?>
                                                <span class="label label-warning">In Entering Process</span>
                                                <?php
                                            } elseif ($employee_row['status'] == "created") {
                                                ?>
                                                <span class="label label-info">Just Created (Need to Start Entering Process)</span>
                                                <?php
                                            }  elseif ($employee_row['status'] == "stable") {
                                                ?>
                                                <span class="label label-success">Stable</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Aware</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Doesn't Aware</span>
                                                <?php

                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "created") {
                                                ?>

                                                <button onclick="location.href='initialenteringprocess.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Entering Process</button>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Employees in Exiting Process (Employee aware)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>NetID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                <?php
                                $employee_result = mysql_query("select * from employee where status = 'exitingVisable';");
                                while ($employee_row = mysql_fetch_array($employee_result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employee_row['netId'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['lastName'];?>
                                        </td>
                                        <td>
                                            <?php
                                            $supervisor_Id = $employee_row['supervisorId'];
                                            $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                                            $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                                            $supervisor_name = $supervisor_name_row['firstName'];
                                            echo $supervisor_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "entering") {
                                                ?>
                                                <span class="label label-warning">In Entering Process</span>
                                                <?php
                                            } elseif ($employee_row['status'] == "created") {
                                                ?>
                                                <span class="label label-info">Just Created (Need to Start Entering Process)</span>
                                                <?php
                                            }  elseif ($employee_row['status'] == "stable") {
                                                ?>
                                                <span class="label label-success">Stable</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Aware</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Doesn't Aware</span>
                                                <?php

                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "created") {
                                                ?>

                                                <button onclick="location.href='initialenteringprocess.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Entering Process</button>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Employees in Exiting Process (Employee not aware)</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>NetID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Supervisor</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                <?php
                                $employee_result = mysql_query("select * from employee where status = 'exitingInvisable';");
                                while ($employee_row = mysql_fetch_array($employee_result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employee_row['netId'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['firstName'];?>
                                        </td>
                                        <td>
                                            <?php echo $employee_row['lastName'];?>
                                        </td>
                                        <td>
                                            <?php
                                            $supervisor_Id = $employee_row['supervisorId'];
                                            $supervisor_name_result = mysql_query("select * from staff where id = '".$supervisor_Id."'");
                                            $supervisor_name_row = mysql_fetch_array($supervisor_name_result);
                                            $supervisor_name = $supervisor_name_row['firstName'];
                                            echo $supervisor_name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "entering") {
                                                ?>
                                                <span class="label label-warning">In Entering Process</span>
                                                <?php
                                            } elseif ($employee_row['status'] == "created") {
                                                ?>
                                                <span class="label label-info">Just Created (Need to Start Entering Process)</span>
                                                <?php
                                            }  elseif ($employee_row['status'] == "stable") {
                                                ?>
                                                <span class="label label-success">Stable</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Aware</span>
                                                <?php

                                            }  elseif ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <span class="label label-warning">In Exiting Process Employee Doesn't Aware</span>
                                                <?php

                                            }
                                            ?>



                                        </td>
                                        <td>
                                            <?php
                                            if ($employee_row['status'] == "created") {
                                                ?>

                                                <button onclick="location.href='initialenteringprocess.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Entering Process</button>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="location.href='hrupdate.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-info">Update Information</button>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
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
