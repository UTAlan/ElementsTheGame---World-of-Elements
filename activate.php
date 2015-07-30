<?php
require_once("dist/php/config.php");

if(!empty($_POST)) {
	$activation_code = $db->real_escape_string($_GET['activation_code']);
	$password = $db->real_escape_string(sha1($_POST['password']));
	$security_hash = $db->real_escape_string($_POST['password']);

	if(empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']) {
		header("Location: activate.php?activation_code=$activation_code&save_attempted=1");
		die();
	}

	$result = $db->query("SELECT id, username FROM users WHERE approved = 0 AND activation_code = '$activation_code'");
	if($result->num_rows == 1) {
		$user = $result->fetch_assoc();
		$_SESSION['user']['id'] = $user['id'];
		$_SESSION['user']['username'] = $user['username'];

		$db->query("UPDATE users SET password = '$password', security_hash = '$security_hash', approved = 1, last_seen = NOW(), date_created = NOW() WHERE id = " . $user['id']);

		header("Location: map_world.php");
  		die();
	}
}

if(!empty($_GET['activation_code'])) {
	$activation_code = $db->real_escape_string($_GET['activation_code']);

	$result = $db->query("SELECT id, username FROM users WHERE approved = 0 AND activation_code = '$activation_code'");
	if($result->num_rows != 1) {
		header("Location: index.php");
	}

	$user = $result->fetch_assoc();

	require_once("dist/php/header.php");
	?>

	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Welcome <?php echo $user['username']; ?>!
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Login -->
            <section class="col-lg-6">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li> -->
                  <li class="pull-left header"><i class="fa fa-sign-in"></i> Set Password</li>
                </ul>
                <div class="box-body">
                  <?php if(!empty($_GET['save_attempted'])) { ?>
                  <div class="callout callout-danger">
                    <h4><i class="icon fa fa-ban"></i> Save Failed</h4>
                    The passwords do not match.
                  </div>
                  <?php } ?>
                  <!-- form start -->
                  <form class="form-horizontal" action="?activation_code=<?php echo $activation_code; ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputConfirmPassword3" name="confirm_password" placeholder="Confirm Password">
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div><!-- /.box-footer -->
                  </form>
                </div><!-- /.box-body-->
              </div>
            </section>
          </div>
        </section>
      </div>
	<?php
	require_once("dist/php/footer.php");
} else {
	header("Location: index.php");
	die();
}
