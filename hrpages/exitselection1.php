<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 4/7/17
 * Time: 9:52 AM
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
    require_once '../outline/ExternalSidebarHr.php';
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Select Exiting Employee Supervisors
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-toggle-right"></i> Home</a></li>
                <li><a href="#">Employee Operation</a></li>
                <li class="active">Exit Employee</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Exiting an Old Employee</h3>
                            <br>
                            <small>Please select a people in each department who will be in charge of the employee's exiting process.</small>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="initialexitingforstaff.php?eid=<?php echo $_GET['eid'];?>" method="post">
                            <div class="box-body" >


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Assign an HR</label>

                                    <select class="form-control" name="hr">
                                        <?php

                                        $supervisor_result = mysql_query("select * from staff where departmentId = 1;");
                                        while ($supervisor_row = mysql_fetch_array($supervisor_result)) {
                                            ?>
                                            <option value="<?php echo $supervisor_row['id']?>"> <?php echo $supervisor_row['firstName']?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <label for="exampleInputPassword1">Assign an IT Department</label>
                                    <select class="form-control" name="it">
                                        <?php

                                        $supervisor_result = mysql_query("select * from staff where departmentId = 2;");
                                        while ($supervisor_row = mysql_fetch_array($supervisor_result)) {
                                            ?>
                                            <option value="<?php echo $supervisor_row['id']?>"> <?php echo $supervisor_row['firstName']?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <label for="exampleInputPassword1">Assign a Financial Department</label>
                                    <select class="form-control" name="fd">
                                        <?php

                                        $supervisor_result = mysql_query("select * from staff where departmentId = 3;");
                                        while ($supervisor_row = mysql_fetch_array($supervisor_result)) {
                                            ?>
                                            <option value="<?php echo $supervisor_row['id']?>"> <?php echo $supervisor_row['firstName']?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <label for="exampleInputPassword1">Assign an Supervisor</label>
                                    <select class="form-control" name="sp">
                                        <?php

                                        $supervisor_result = mysql_query("select * from staff where departmentId = 4;");
                                        while ($supervisor_row = mysql_fetch_array($supervisor_result)) {
                                            ?>
                                            <option value="<?php echo $supervisor_row['id']?>"> <?php echo $supervisor_row['firstName']?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Start Exiting Process and Notify Employee</button>
                            </div>
                        </form>


                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->

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

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['supervisor'])){
    require_once "../dbaccess.php";

    echo mysql_query("insert into employee values('','','".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['password']."','created','".$_POST['supervisor']."')");

//    echo mysql_query("SELECT LAST_INSERT_ID() ;");
    $index = "hremployee.php";
    echo '<script language="javascript">';
    echo "window.location.href='$index';";
    echo '</script>';


}

?>


<?php
require_once '../outline/ExternalFoot.php';
?>
</body>
</html>
