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
                        <form role="form" action="initialexitingforstaff2.php?eid=<?php echo $_GET['eid'];?>" method="post">
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
                                <button type="submit" class="btn btn-primary">Start Exiting Process without Letting Employee Know</button>
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
            <b>Cornell University</b>
        </div>
        <strong>Cornell IPP. Front-end powered by Almsaeed Studio.</strong>
    </footer>


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
