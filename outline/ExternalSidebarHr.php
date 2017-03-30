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
                <a href="#"><i class="fa fa-circle text-success"></i> HR</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="../hrpages/hrdashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="../hrpages/hremployee.php">
                    <i class="fa fa-table"></i> <span>Employee Status</span>
                </a>
            </li>


            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Employee Operation</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../hrpages/hrenroll.php"><i class="fa fa-toggle-right"></i>Enroll New Employee</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-toggle-left"></i>Leave Employee</a></li>
                </ul>
            </li>

            <li>
                <a href="../hrpages/hrdashboard.php">
                    <i class="fa fa-gear"></i> <span>Setting</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>