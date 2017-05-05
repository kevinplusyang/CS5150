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
                <a href="#"><i class="fa fa-circle text-success"></i> Employee</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="employeedashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="mytask.php">
                    <i class="fa fa-table"></i> <span>My Task</span>
                </a>
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