<header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IPP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Cornell IPP System</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <?php

                    if ($_SESSION['departmentId'] == 1) {
                        ?>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>

                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i>
                                                <?php
                                                $number_result = mysql_query("select count(*) from employee where status = 'created' ;");
                                                $number_row = mysql_fetch_array($number_result);
                                                echo $number_row['count(*)'];
                                                ?>
                                                new employees <br>
                                                need to start the entering process
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="glyphicon glyphicon-log-in text-yellow"></i>
                                                <?php
                                                $number_result = mysql_query("select count(*) from employee where status = 'entering' ;");
                                                $number_row = mysql_fetch_array($number_result);
                                                echo $number_row['count(*)'];
                                                ?>
                                                employee is entering
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="glyphicon glyphicon-log-out text-green"></i>
                                                <?php
                                                $number_result = mysql_query("select count(*) from employee where status = 'exitingVisable' or status = 'exitingInvisable';");
                                                $number_row = mysql_fetch_array($number_result);
                                                echo $number_row['count(*)'];
                                                ?>
                                                employee is leaving
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="footer"><a href="../hrpages/hremployee.php">View all</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                ?>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['firstName']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
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
                                <small>Welcome back! Have a great day!</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>