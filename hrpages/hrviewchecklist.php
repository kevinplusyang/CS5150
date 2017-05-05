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
                        <?php
                            $result = mysql_query("select * from checklist_enter_entry;");
                             while ($row = mysql_fetch_array($result)){
                                    echo $row['content'];
                                    echo '</br>';
                            }


                        ?>

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
require_once '../outline/ExternalFoot.php';
?>
</body>
</html>
