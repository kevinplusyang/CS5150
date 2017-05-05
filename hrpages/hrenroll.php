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
                Enroll a New Employee
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-toggle-right"></i> Home</a></li>
                <li><a href="#">Employee Operation</a></li>
                <li class="active">Enroll New Employee</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Employee Information</h3>
                            <br>
                            <small>Please input the new employee information according to the instruction. You can create
                            a new employee and manually start the check in process by clicking submit button or create a new
                            employee and check in process automatically. NetID is not a required field. You can update the NetID
                            information later in the system.</small>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="box-body" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cornell NetID</label>
                                    <input class="form-control"  name="netId" placeholder="Enter NetID (Optional)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input class="form-control" name="firstName" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input class="form-control" name="lastName" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Assign a Supervisor</label>

                                    <select class="form-control" name="supervisor">
                                        <?php

                                        $supervisor_id_result = mysql_query("select * from worksIn where departmentId = 4");
                                        while ($idRow = mysql_fetch_array($supervisor_id_result)) {
                                            $supervisor_result = mysql_query("select * from staff where id = '".$idRow['staffId']."' ");
                                            $nameRow = mysql_fetch_array($supervisor_result);
                                            ?>
                                            <option value="<?php echo $idRow['staffId']?>"> <?php echo $nameRow['firstName']; echo " "; echo $nameRow['lastName']?> </option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Create Employee</button>
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
