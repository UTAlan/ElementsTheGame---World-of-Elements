<?php
require_once("dist/php/header.php");
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            World Map
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Locations</a></li>
            <li class="active">World Map</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- World Map -->
            <section class="col-lg-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-map-marker"></i> Current Region Name</li>
                </ul>
                <div class="box-body">
                  <div id="world-map-div" style="width: 100%;">
                    <table id="world-map-table" style="width:100%;">
                      <tr>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_00.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_10.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_20.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_30.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_40.png" alt="" width="100%" /></a></td>
                      </tr>
                      <tr>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_01.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_11.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_21.png" alt="" width="100%" class="active" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_31.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_41.png" alt="" width="100%" /></a></td>
                      </tr
                      <tr>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_02.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_12.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_22.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_32.png" alt="" width="100%" /></a></td>
                        <td width="20%"><a href="#"><img src="dist/img/maps/world_42.png" alt="" width="100%" /></a></td>
                      </tr>
                    </table>
                    <style>
                    #world-map-table a:hover img {
                      border: solid 1px red;
                    }
                    #world-map-table img.active {
                      border: solid 1px blue;
                    }
                    </style>
                  </div>
                </div><!-- /.box-body-->
              </div>
            </section>
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php
require_once("dist/php/footer.php");