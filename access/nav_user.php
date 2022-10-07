<div class='page-topbar gradient-blue1'>
        <div class='logo-area crypto'>

        </div>
        <div class='quick-area'>
            <div class='pull-left'>
                <ul class="info-menu left-links list-inline list-unstyled">
                    <li class="sidebar-toggle-wrap">
                        <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                   
                
                    
                    <li class="hidden-sm hidden-xs searchform">
                        <form action="#" method="post">
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                                <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
                            </div>
                            <input type='submit' value="">
                        </form>
                    </li>
                </ul>
            </div>
            <div class='pull-right'>
                <ul class="info-menu right-links list-inline list-unstyled">
                    
                   
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle">
                            <img src="data/profile/avatar.jpg" alt="user-image" class="img-circle img-inline">
                            <span> <?= $_SESSION['name']; ?><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu profile animated fadeIn">
                           
                            <li>
                                <a href="settings.php">
                                    <i class="fa fa-user"></i> Settings
                                </a>
                            </li>
                          
                            <li class="last">
                                <a href="logout.php">
                                    <i class="fa fa-lock"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="page-container row-fluid container-fluid">

        <!-- SIDEBAR - START -->

        <div class="page-sidebar fixedscroll">

            <!-- MAIN MENU - START -->
            <div class="page-sidebar-wrapper crypto" id="main-menu-wrapper">
                <?= $_SERVER['REQUEST_URI']; ?>
                <ul class='wraplist'>
                    <li class='menusection'>Main</li>
                    <li class="<?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/index.php'?'active':'' ?>">
                        <a href="index.php">
                            <i class="img relative crypto-ic ">
                                <img src="data/crypto-dash/icons/1.png" alt="" class="ic1 width-20">
                            </i>
                            <span class="title <?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/index.php'?'active_link':'' ?>">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/choose_plan.php'?'active':'' ?>">
                        <a href="choose_plan.php">
                            <i class="img">
                                <img src="data/crypto-dash/icons/2.png" alt="" class="width-20">
                            </i>
                            <span class="title <?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/choose_plan.php'?'active_link':'' ?>">Deposit</span>
                        </a>
                    </li>
                   
                    <li class="<?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/withdrawal.php'?'active_li':'' ?>">
                        <a href="withdrawal.php">
                            <i class="img">
                                <img src="data/crypto-dash/icons/8.png" alt="" class="width-20">
                            </i>
                            <span class="title <?= $_SERVER['REQUEST_URI']=='/cfxmining/dashboard/withdrawal.php'?'active_links':'' ?>">Withdrawals</span>
                        </a>
                    </li>
                    

                </ul>

            </div>
            <!-- MAIN MENU - END -->

        </div>