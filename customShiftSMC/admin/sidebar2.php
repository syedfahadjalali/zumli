<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../images/thumbnails/1.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hi, <?php echo $_SESSION['name'] ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="./signin.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['admin_type']))
                {
                    if ($_SESSION['admin_type'] == 1)
                    {
                        ?>
                        <li>
                            <a href = "./adminusers.php">
                                <i class = "fa fa-dashboard"></i> <span>Create New Admin</span>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Racecourse</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./race_courses.php"><i class="fa fa-angle-double-right"></i> Racecourse </a></li>
                        <li><a href="./race_course_races.php"><i class="fa fa-angle-double-right"></i> Races </a></li>
                        <!-- <li><a href="./race_course_track.php"><i class="fa fa-angle-double-right"></i> Track </a></li> -->
                        <li><a href="./race_course_contact_us.php"><i class="fa fa-angle-double-right"></i> Contact Us </a></l>
                        <!--<li><a href="./race_courses_articles.php"><i class="fa fa-angle-double-right"></i> Articles</a></li>-->
                        <!--<li><a href="./race_courses_offers.php"><i class="fa fa-angle-double-right"></i> Offers</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="./race_course_track.php">
                        <i class="fa fa-th"></i> <span>Racecourse Track</span>
                    </a>
                </li>
                <li>
                    <a href="./news.php">
                        <i class="fa fa-th"></i> <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="./about.php?action_request=edit_records">
                        <i class="fa fa-th"></i> <span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="./contact.php?action_request=edit_records">
                        <i class="fa fa-th"></i> <span>Contact Us</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Columnists</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./columnists.php"><i class="fa fa-angle-double-right"></i> Columnists </a></li>
                        <li><a href="./columnists_articles.php"><i class="fa fa-angle-double-right"></i> Columnists Articles</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./addGeneratDetails.php?action_request=edit_records">
                        <i class="fa fa-th"></i> <span>About This App</span>
                    </a>
                </li>

                <li>
                    <a href="./publications.php">
                        <i class="fa fa-calendar"></i> <span>Publications</span>
                    </a>
                </li>
                <li>
                    <a href="./home.php">
                        <i class="fa fa-calendar"></i> <span>Signout</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>