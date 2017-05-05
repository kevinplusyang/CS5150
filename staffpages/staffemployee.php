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
            $result = mysql_query("select * from department where id = '".$_GET['departmentId']."'");
            $row = mysql_fetch_array($result);
            $department = $row['name'];
            ?>
            <h1>
                View Employee Status as <?php echo $department;?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-toggle-right"></i> Home</a></li>

                <li class="active">View Employee Status as <?php echo $department;?></li>
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
                                    if ($_GET['departmentId'] == 4) {
                                        ?>
                                        <?php
                                        $employee_result = mysql_query("select * from employee where supervisorId = '". $_SESSION["userId"]."' and status != 'created';");
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
                                                    } elseif ($employee_row['status'] == "stable") {
                                                        ?>
                                                        <span class="label label-success">Stable</span>
                                                        <?php

                                                    } else if ($employee_row['status'] == "exitingVisable") {
                                                        ?>
                                                        <span class="label label-info">In Exiting Process. Employee Awares</span>
                                                        <?php
                                                    } else if ($employee_row['status'] == "exitingInvisable") {
                                                        ?>
                                                        <span class="label label-info">In Exiting Process. Employee not Awares</span>
                                                        <?php
                                                    }
                                                    ?>



                                                </td>
                                                <td>

                                                    <button onclick="location.href='viewdetails.php?eid=<?php echo $employee_row['id']?>&did=<?php echo $_GET['departmentId'];?>'" type="button" class="btn btn-block btn-info">View Entering Detail</button>

                                                    <?php
                                                    if ($employee_row['status'] == "exitingInvisable" || $employee_row['status'] == "exitingVisable") {
                                                        ?>
                                                        <button onclick="location.href='viewexitingdetail.php?eid=<?php echo $employee_row['id']?>&did=<?php echo $_GET['departmentId'];?>'" type="button" class="btn btn-block btn-warning">View Exiting Detail</button>
                                                        <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    } else {
                                        ?>
                                        <?php
                                        $employee_result = mysql_query("select * from employee where  status != 'created';");
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
                                                    } elseif ($employee_row['status'] == "stable") {
                                                        ?>
                                                        <span class="label label-success">Stable</span>
                                                        <?php

                                                    } else if ($employee_row['status'] == "exitingVisable") {
                                                        ?>
                                                        <span class="label label-info">In Exiting Process. Employee Awares</span>
                                                        <?php
                                                    } else if ($employee_row['status'] == "exitingInvisable") {
                                                        ?>
                                                        <span class="label label-info">In Exiting Process. Employee not Awares</span>
                                                        <?php
                                                    }
                                                    ?>



                                                </td>
                                                <td>

                                                    <button onclick="location.href='viewdetails.php?eid=<?php echo $employee_row['id']?>&did=<?php echo $_GET['departmentId'];?>'" type="button" class="btn btn-block btn-info">View Entering Detail</button>

                                                    <?php
                                                    if ($employee_row['status'] == "exitingInvisable" || $employee_row['status'] == "exitingVisable") {
                                                        ?>
                                                        <button onclick="location.href='viewexitingdetail.php?eid=<?php echo $employee_row['id']?>&did=<?php echo $_GET['departmentId'];?>'" type="button" class="btn btn-block btn-warning">View Exiting Detail</button>
                                                        <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
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
