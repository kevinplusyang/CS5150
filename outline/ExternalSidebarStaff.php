<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['firstName'];?> <?php echo $_SESSION['lastName'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i>

                    <?php
                        $result = mysql_query("select * from worksIn where staffId = '".$_SESSION['id']."' ");
                        while ($row = mysql_fetch_array($result)) {
                            $did = $row['departmentId'];
                            $result2 = mysql_query("select * from department where id = '".$did."' ");
                            $row2 = mysql_fetch_array($result2);
                            $dname = $row2['name'];
                            echo $dname;
                            echo '/';
                        }
                    ?>

                </a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="../staffpages/staffdashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>


            <?php
                $result = mysql_query("select * from worksIn where staffId = '".$_SESSION['id']."' ");
                while ($row = mysql_fetch_array($result)) {

                    $result2 = mysql_query("select * from department where id = '".$row['departmentId']."' ");
                    $row2 = mysql_fetch_array($result2);
                    $departmentName = $row2['name'];

                    ?>
                        <li>
                            <a href="../staffpages/staffemployee.php?departmentId=<?php echo $row['departmentId'];?>">
                                <i class="fa fa-table"></i> <span>View as <?php echo $departmentName?> </span>
                            </a>
                         </li>
                    <?php
                }
            ?>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>