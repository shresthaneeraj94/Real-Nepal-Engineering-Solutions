<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title">Real Nepal Eng- Sol- </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="docs/logo.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome to,</span>
                <h2>Admin Panel</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="/@dmin"><i class="fa fa-home"></i> Home
                            <!--                            <span class="fa fa-chevron-down"></span>-->
                        </a>
                        <!--                        <ul class="nav child_menu">-->
                        <!--                            <li><a href="index.html">Dashboard</a></li>-->
                        <!--                            <li><a href="index2.html">Dashboard2</a></li>-->
                        <!--                            <li><a href="index3.html">Dashboard3</a></li>-->
                        <!--                        </ul>-->
                    </li>
                    <li><a><i class="fa fa-credit-card"></i>Navigation<span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/@dmin/Navigation">View Navigation List</a></li>
                            <li><a href="/@dmin/AddNavigation">Add Navigation</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-camera"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/@dmin/Gallery">View Gallery List</a></li>
                            <li><a href="/@dmin/AddGallery">Add Gallery</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> List image/video <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/@dmin/Image"><i class="fa fa-image"></i> Image</a></li>
                            <li><a href="/@dmin/Video"><i class="fa fa-video-camera"></i> Video</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-envelope-o"></i> Mail <span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/@dmin/Mail"><i class="fa fa-envelope"></i> All Mail</a></li>
                            <li><a href="/@dmin/NewMail"> <i class="fa fa-eye"></i> New mail</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /sidebar menu -->
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">


                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-cogs"></i> <b>Admin</b>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <div id="navMail">
                    <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">{{count}}</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li v-for="notes in notification.slice(0,3)" >
                                <a href="/@dmin/newMail">
                                    <span>
                                        <b>{{notes.name}}</b>
                                        <span class="time">{{notes.created_at}}</span>
                                    </span>
                                    <br>
                                    <i class="message">
                                        {{notes.subject}}
                                    </i>
                                </a>
                            </li>
                            <li>
                                <div class="text-center">
                                    <a href="/@dmin/Mail">
                                        <strong>See All Mails</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </div>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->