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
                Update Employee
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-toggle-right"></i> Home</a></li>
                <li><a href="#">Employee Operation</a></li>
                <li class="active">Update Employee</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Employee</h3>
                            <br>
                            <small>Please enter the information and update.</small>
                        </div>

                        <?PHP
                            $information_result = mysql_query("select * from employee where id = '".$_GET['eid']."'");
                            $information_row = mysql_fetch_array($information_result);
                        ?>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']?>?eid=<?php echo $_GET['eid']?>" method="post">
                            <div class="box-body" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cornell NetID</label>
                                    <input class="form-control"  value="<?php echo $information_row['netId'];?>" name="netId" placeholder="Enter NetID (Optional)">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input class="form-control" value="<?php echo $information_row['firstName'];?>" name="firstName" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input class="form-control" value="<?php echo $information_row['lastName'];?>" name="lastName" placeholder="Enter Last Name">
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
                                <button type="submit" class="btn btn-primary">Update Information</button>
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

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['supervisor'])){
    require_once "../dbaccess.php";

    echo mysql_query("update employee set netId = '".$_POST['netId']."', firstName = '".$_POST['firstName']."', lastName = '".$_POST['lastName']."', supervisorId = '".$_POST['supervisor']."' where id = '".$_GET['eid']."' ");

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
