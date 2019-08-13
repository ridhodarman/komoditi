<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/Chart.js"></script>

    <?php include('koneksi.php'); ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> Stexo
                        </span>
                    <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">            

                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a> 
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>                    
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="index.html" class="waves-effect">
                                <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right">9+</span> <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span> Email <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Email Read</a></li>
                                <li><a href="email-compose.html">Email Compose</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">

                        <div class="col-sm-6 col-xl-3">
                            
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title mb-4">Peta</h4>
                                        <div id="map" style="width: 100%; height: 400px"></div>
                                    <div id="morris-area-example" class="morris-charts morris-chart-height"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        
                        
                                        <?php
      $sql=pg_query("SELECT * FROM jenis");
      $no=1;
      while ($data=pg_fetch_assoc($sql)) {
        $jenis = $data['nama_jenis'];
        $satuan = "(".$data['satuan'].") ";
        $n=0;
        $sql2=pg_query("SELECT H.*, K.kabupaten FROM hasil AS H
                        join sumbar AS K ON H.gid=K.gid
                        join jenis AS J ON J.id_jenis=H.id_jenis
                        where H.id_jenis = '$no' order by H.gid");
        while ($data2=pg_fetch_assoc($sql2)) {
            $kabupaten[$n]=$data2['kabupaten'];
            $jumlah[$n]=$data2['jumlah'];
            $n++;
        }     
?>
    <div class="col-xl-12">
      <div class="card m-b-30">
          <div class="card-body">
      <center><h1 class="mt-0 header-title mb-4"><?php echo $jenis ?></h1></center>
      <canvas id="myChart<?php echo $no ?>"></canvas>
          </div>
        </div>
      </div>
      <script>
        var ctx = document.getElementById("myChart<?php echo $no ?>").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: [<?php
                      $i=0;
                      while ($i<$n) {
                        if ($i<$n-1) {
                          echo "'".$kabupaten[$i]."',";
                        }
                        else {
                          echo "'".$kabupaten[$i]."'" ;
                        }
                        $i++;
                      } 
            ?>],
            datasets: [{
              label: '<?php echo $satuan ?>',
              data: [<?php
                      $i=0;
                      while ($i<$n) {
                        if ($i<$n-1) {
                          echo "'".$jumlah[$i]."',";
                        }
                        else {
                          echo "'".$jumlah[$i]."'" ;
                        }
                        $i++;
                      } 
            ?>],
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
      </script>
<?php
$no++;
}
?>
                                    <div id="morris-area-example" class="morris-charts morris-chart-height"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <footer class="footer">
                © 2019 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!--Morris Chart-->
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>

    <script src="assets/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
      var map;
      function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: -0.323489,
              lng: 100.349190
            },
            zoom: 8,
            mapTypeId: 'roadmap'
          });
          digitasinya();
      }
var nkota = 0; var digitkota = [];
function digitasinya() {
  $.ajax({
    url: 'data.php',
    dataType: 'json',
    cache: false,
    success: function (arrays) {
      for (i = 0; i < arrays.features.length; i++) {
        var data = arrays.features[i];
        var arrayGeometries = data.geometry.coordinates;
        var jenis = data.jenis;
        var id = data.properties.id;
        var link = "<button class='btn btn-info btn-xs fa fa-info-circle' title='View Details' onclick='detailrumah("+'"'+data.properties.id+'"'+")'></button>";
        var p1 = ' ID: ' + data.properties.id;
        var p2 = '<p>' + data.properties.nama + '</p>';
        var p3 = link + p1 + p2 +'('+jenis+') ';
        var idTitik = 0;
        var hitungTitik = [];
        while (idTitik < arrayGeometries[0][0].length) {
          var aa = arrayGeometries[0][0][idTitik][0];
          var bb = arrayGeometries[0][0][idTitik][1];
          hitungTitik[idTitik] = {
            lat: bb,
            lng: aa
          };
          idTitik += 1;
        }
        var color = 'black';
        if (id=="59") {
            color='yellow';
        }
        else if (id=="60") {
            color='magenta';
        }
        else if (id=="61") {
            color='green';
        }
        else if (id=="62") {
            color='red';
        }
        else if (id=="63") {
            color='blue';
        }
        else if (id=="65") {
            color='SpringGreen';
        }
        else if (id=="66") {
            color='purple';
        }
        else if (id=="67") {
            color='cyan';
        }
        else if (id=="68") {
            color='white';
        }
        else if (id=="69") {
            color='navy';
        }
        else if (id=="70") {
            color='Chartreuse';
        }
        else if (id=="71") {
            color='purple';
        }
        else if (id=="72") {
            color='DarkOrange';
        }
        else if (id=="73") {
            color='Gold';
        }
        else if (id=="74") {
            color='Indigo';
        }
        else if (id=="75") {
            color='LightCoral';
        }
        else if (id=="76") {
            color='MediumBlue';
        }
        else if (id=="77") {
            color='Sienna';
        }
        else if (id=="78") {
            color='black';
        }
        digitkota[nkota] = new google.maps.Polygon({
          paths: hitungTitik,
          strokeColor: 'red',
          strokeOpacity: 2,
          strokeWeight: 0.5,
          //fillColor: '#B22222',
          fillColor: color,
          fillOpacity: 0.5,
          zIndex: 1,
          content: p3
        });
        digitkota[nkota].setMap(map);
        digitkota[nkota].addListener('click', function (event) {
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          var info = {
            lat: lat,
            lng: lng
          };
          infoWindow.setContent(this.content);
          infoWindow.setPosition(info);
          infoWindow.open(map);
        });
        nkota = nkota + 1;
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      $('#gagal').modal('show');
      $('#notifikasi').empty();$('#notifikasi').append(xhr.status);
      $('#notifikasi').append(thrownError);
    }
  });
  var infoWindow = new google.maps.InfoWindow({
    map: map
  });
} 
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&callback=initMap"
    async defer></script>

</body>


<!-- Mirrored from themesdesign.in/stexo/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2019 02:08:43 GMT -->
</html>