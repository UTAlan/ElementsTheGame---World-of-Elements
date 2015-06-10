<?php
require_once("dist/php/config.php");



require_once("dist/php/header.php");
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Login or Register
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
                  <li class="pull-left header"><i class="fa fa-sign-in"></i> Login</li>
                </ul>
                <div class="box-body">
                  <?php if(!empty($_GET['login_attempted'])) { ?>
                  <div class="callout callout-danger">
                    <h4><i class="icon fa fa-ban"></i> Login Failed</h4>
                    Either your username or password are incorrect or your account has not yet been approved.
                  </div>
                  <?php } ?>
                  <!-- form start -->
                  <form class="form-horizontal" action="login.php" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputUsername3" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputUsername3" name="username" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div><!-- /.box-footer -->
                  </form>
                </div><!-- /.box-body-->
              </div>
            </section>
            <!-- Register -->
            <section class="col-lg-6">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li> -->
                  <li class="pull-left header"><i class="fa fa-users"></i> Register</li>
                </ul>
                <div class="box-body">
                  <?php if(!empty($_GET['register_attempted'])) { ?>
                  <div class="callout callout-danger">
                    <h4><i class="icon fa fa-ban"></i> Register Failed</h4>
                    Please verify that all fields have been filled out and that your username has not already been registered and approved.
                  </div>
                  <?php } ?>
                  <?php if(!empty($_GET['register_successful'])) { ?>
                  <div class="callout callout-success">
                    <h4><i class="icon fa fa-check"></i> Register Successful</h4>
                    Please check your email for an activation link.
                  </div>
                  <?php } ?>
                  <!-- form start -->
                  <form class="form-horizontal" action="register.php" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputUsername3" class="col-sm-4 control-label">Forum Username</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="inputUsername3" name="username" placeholder="Username">
                        </div>
                      </div>
                      <p class="margin">Eventually, this will send the specified user an email with an activation link.<br />Until then, it redirects to that activation url.</p>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Register</button>
                    </div><!-- /.box-footer -->
                  </form>
                </div><!-- /.box-body-->
              </div>
            </section>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php
require_once("dist/php/footer.php");