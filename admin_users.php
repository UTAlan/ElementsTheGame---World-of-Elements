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

// Get All Members for Table
$all_users_result = $db->query("SELECT id, username, admin, date_created, last_seen FROM users WHERE approved = 1 ORDER BY date_created");
$all_users = array();
while(($row = $all_users_result->fetch_assoc())) {
  $all_users[] = $row;
}

// Page Config
$PAGE['jquery'] = '$("#all_users_table").DataTable();';
$PAGE['nav']['admin'] = true;
$PAGE['subnav']['admin_users'] = true;
$PAGE['title'] = 'Manage Users';

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
          <div class="row">
            <div class="col-md-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">All Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="all_users_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Date Created</th>
                        <th>Last Seen</th>
                        <th>User Level</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($all_users as $user) {
                        echo '<tr>';
                        echo '<td>' . $user['id'] . '</td>';
                        echo '<td>' . $user['username'] . '</td>';
                        echo '<td>' . $user['date_created'] . '</td>';
                        echo '<td>' . $user['last_seen'] . '</td>';
                        echo '<td>' . ($user['admin'] ? 'Admin' : 'Regular') . '</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
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