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
                            <h3 class="box-title">All Employees</h3>
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
                                $employee_result = mysql_query("select * from employee;");
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
                                            if ($employee_row['status'] == "entering" || $employee_row['status'] == "stable") {
                                                ?>
                                                <button onclick="location.href='initialexitingforstaff.php?eid=<?php  echo $employee_row['id'];?>'" type="button" class="btn btn-block btn-success">Start Leaving Process and Notify Employee</button>
                                                <button onclick="location.href='initialexitingforstaff2.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Start Leaving Process and Donot Notify Employee</button>
                                                <?php
                                            } else if ($employee_row['status'] == "exitingVisable") {
                                                ?>
                                                No operation supported
                                                <?php
                                            } else if ($employee_row['status'] == "exitingInvisable") {
                                                ?>
                                                <button onclick="location.href='notifyemployee.php?eid=<?php echo $employee_row['id']?>'" type="button" class="btn btn-block btn-success">Notify Employee</button>
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
