<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php if(!empty($PAGE['title'])) { echo $PAGE['title'] . ' &middot; '; } ?>World of Elements &middot; Elements Community</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" /> 

    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"Ad><b>W</b>o<b>E</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>World</b> of <b>Elements</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php if(!empty($_SESSION['user'])) { ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $_SESSION['user']['avatar_url']; ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $_SESSION['user']['username']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $_SESSION['user']['avatar_url']; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION['user']['username']; ?>
                      <small>Member since <?php echo $_SESSION['user']['date_created']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <?php if(!empty($_SESSION['user'])) { ?>
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['user']['avatar_url']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user']['username']; ?></p>
              <i class="fa fa-star" title="Level"></i>&nbsp;&nbsp;<span title="Level">1</span>&nbsp;&nbsp;&nbsp;
              <img src="dist/img/electrum.png" alt="Electrum" title="Electrum" />&nbsp;&nbsp;<span title="Electrum">100</span>&nbsp;&nbsp;&nbsp;
              <i class="fa fa-hand-o-right" title="Turns"></i>&nbsp;&nbsp;<span title="Turns">2</span>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview<?php if(!empty($PAGE['nav']['admin'])) { echo ' active'; } ?>">
              <a href="admin.php">
                <i class="fa fa-server"></i>
                <span>Administration</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li<?php if(!empty($PAGE['subnav']['admin_stats'])) { echo ' class="active"'; } ?>>
                  <a href="admin_stats.php">
                    <i class="fa fa-circle-o"></i>
                    Admin Stats
                  </a>
                </li>
                <li<?php if(!empty($PAGE['subnav']['admin_crafting'])) { echo ' class="active"'; } ?>>
                  <a href="#">
                    <i class="fa fa-circle-o"></i>
                    Manage Crafting
                  </a>
                </li>
                <li<?php if(!empty($PAGE['subnav']['admin_quests'])) { echo ' class="active"'; } ?>>
                  <a href="#">
                    <i class="fa fa-circle-o"></i>
                    Manage Quests
                  </a>
                </li>
                <li<?php if(!empty($PAGE['subnav']['admin_maps'])) { echo ' class="active"'; } ?>>
                  <a href="#">
                    <i class="fa fa-circle-o"></i>
                    Manage Maps
                  </a>
                </li>
                <li<?php if(!empty($PAGE['subnav']['admin_tournaments'])) { echo ' class="active"'; } ?>>
                  <a href="#">
                    <i class="fa fa-circle-o"></i>
                    Manage Tournaments
                  </a>
                </li>
                <li<?php if(!empty($PAGE['subnav']['admin_users'])) { echo ' class="active"'; } ?>>
                  <a href="admin_users.php">
                    <i class="fa fa-circle-o"></i>
                    Manage Users
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview<?php if(!empty($PAGE['nav']['world_map'])) { echo ' active'; } ?>">
              <a href="map_world.php">
                <i class="fa fa-globe"></i> 
                <span>World Map</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Inventory</span>
                <span class="label label-primary pull-right">4</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Crafting</span>
                <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Quests</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Tournaments</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Skill Tree</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Store</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
          </ul>
          <?php } ?>
        </section>
        <!-- /.sidebar -->
      </aside>