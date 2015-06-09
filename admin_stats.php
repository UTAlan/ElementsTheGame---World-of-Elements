<?php
require_once("dist/php/config.php");

if(!empty($_SESSION['admin'])) {
  header("Location: index.php");
  die();
}

// Get New Member Count
$new_users_count_result = $db->query("SELECT COUNT(*) as cnt FROM users WHERE approved = 1 AND date_created BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()");
$row = $new_users_count_result->fetch_assoc();
$new_users_count = $row['cnt'];

// Get New Members for Widget
$new_users_result = $db->query("SELECT username, avatar_url, date_created FROM users WHERE approved = 1 ORDER BY date_created DESC LIMIT 8");
$new_users = array();
while(($row = $new_users_result->fetch_assoc())) {
  $new_users[] = $row;
}

// Page Config
$PAGE['nav']['admin'] = true;
$PAGE['subnav']['admin_stats'] = true;
$PAGE['title'] = 'Admin Stats';

require_once("dist/php/header.php");
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administration
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-server"></i> Administration</li>
            <li class="active">Admin Stats</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Stat #1</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Stat #2</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Stat #3</span>
                  <span class="info-box-number">760</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box" title="Last 30 Days">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number"><?php echo $new_users_count; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">More Stats</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                </div>
              </div>
            </div><!-- /.col -->
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php 
                        foreach($new_users as $user) {
                          echo '<li>';
                          echo '<a class="users-list-name" href="#"><img src="' . $user['avatar_url'] . '" alt="Avatar" /></a>';
                          echo '<a class="users-list-name" href="#">' . $user['username'] . '</a>';
                          echo '<span class="users-list-date">' . date('M j', strtotime($user['date_created'])) . '</span>';
                          echo '</li>';
                        } 
                        ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="#" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php
require_once("dist/php/footer.php");