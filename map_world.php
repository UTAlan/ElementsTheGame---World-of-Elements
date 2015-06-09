<?php
// JQuery
$PAGE['jquery'] = <<<JQUERY

fix_world_map_height();

$( window ).resize(function() {
  fix_world_map_height();
});

JQUERY;

// Page Config
$PAGE['nav']['world_map'] = true;
$PAGE['title'] = 'World Map';

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
            <li class="active">
              <i class="fa fa-globe"></i> 
              World Map
            </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- World Map -->
            <section class="col-lg-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-map-marker"></i> 
                    Current Region Name
                  </h3>
                </div>
                <div class="box-body" id="world-map-wrapper">
                  <div id="world-map-div">
                    <div class='hexrow'>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                    </div>
                    <div class='hexrow'>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                    </div>
                    <div class='hexrow'>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                    </div>
                    <div class='hexrow'>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                    </div>
                    <div class='hexrow'>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                      <div class='hexagon'></div>
                    </div>
                    <style>
                      #world-map-div { clear: both; }
                      .hexrow { margin: -11.7% 0; text-align: center; clear: both; }
                      .hexrow:first-child { margin-top: 0%; }
                      .hexagon {
                          position: relative;
                          display: inline-block;
                          overflow: hidden;
                          margin: 0 5%;
                          padding: 10%;
                          transform: rotate(30deg) skewY(30deg) scaleX(.866); /* .866 = sqrt(3)/2 */
                          cursor: pointer;
                      }
                      .hexagon:before, .hexcontent:after {
                          display: block;
                          position: absolute;
                          /* 86.6% = (sqrt(3)/2)*100% = .866*100% */
                          top: 6.7%; right: 0; bottom: 6.7%; left: 0; /* 6.7% = (100% -86.6%)/2 */
                          transform: scaleX(1.155) /* 1.155 = 2/sqrt(3) */ 
                                     skewY(-30deg) rotate(-30deg);
                          background-color: #000;
                          background-size: cover;
                          content: '';
                      }
                      /* add background images to :before pseudo-elements */
                      /* .hexrow:nth-child(1) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/UTAlan.png'); 
                      } */
                      .hexrow > .hexagon:before {
                          background-image: url('dist/img/UTAlan.png'); 
                      }
                      .hexrow:nth-child(1) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/maps/world_00.png'); 
                      }
                      .hexrow:nth-child(3) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/maps/world_01.png'); 
                      }
                      .hexrow:nth-child(5) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/maps/world_02.png'); 
                      }
                      .hexrow:nth-child(2) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/maps/world_10.png'); 
                      }
                      .hexrow:nth-child(4) .hexagon:nth-child(1):before {
                          background-image: url('dist/img/maps/world_11.png'); 
                      }
                      .hexrow:nth-child(1) .hexagon:nth-child(2):before {
                          background-image: url('dist/img/maps/world_20.png'); 
                      }
                      .hexrow:nth-child(3) .hexagon:nth-child(2):before {
                          background-image: url('dist/img/maps/world_21.png'); 
                      }
                      .hexrow:nth-child(5) .hexagon:nth-child(2):before {
                          background-image: none;
                      }
                      .hexrow:nth-child(2) .hexagon:nth-child(2):before {
                          background-image: none;
                      }
                      .hexrow:nth-child(4) .hexagon:nth-child(2):before {
                          background-image: url('dist/img/maps/world_11.png'); 
                      }
                      .hexrow:nth-child(1) .hexagon:nth-child(3):before {
                          background-image: url('dist/img/maps/world_20.png'); 
                      }
                      .hexrow:nth-child(3) .hexagon:nth-child(3):before {
                          background-image: none;
                      }
                      .hexrow:nth-child(5) .hexagon:nth-child(3):before {
                          background-image: none;
                      }
                    </style>
                  </div>
                </div><!-- /.box-body-->
              </div>
            </section>
            <div class="col-lg-4">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <i class="fa fa-info-circle"></i> 
                    Map Dialogue/Info
                  </h3>
                </div>
                <div class="box-body">
                  <p>You have completed all actions for the current location. You have <b>3</b> turns remaining. You may travel to a new location for more options.</p>
                </div>
              </div>
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php
require_once("dist/php/footer.php");