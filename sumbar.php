<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <script src="code/highcharts.js"></script>
	<script src="code/modules/exporting.js"></script>

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
                <a href="index.php" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> <!-- Stexo -->
                        </span>
                    <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">            

                    

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
                <?php include ('sidebar.php'); ?>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <?php
          // $kategori = $_GET['kategori'];
          // $tahun = $_GET['tahun'];
          // $sql=pg_query("SELECT nama_kategori FROM kategori where id_kategori = '$kategori'");
          // while ($data=pg_fetch_assoc($sql)) {
          //   $nama_kategori = $data['nama_kategori'];
          // }   
        ?>

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                              <center>
                                <!-- <h4 class="page-title" style="width: 100%"><?php echo $nama_kategori; ?> Tahun <?php echo $tahun; ?></h4> -->
                              </center>
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
                        <!-- <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title mb-4">Peta</h4>
                                        <div id="map" style="width: 82%; height: 400px; float: left;"></div>
                                        <div style="width: 18%; float: right; padding-left: 2%">
                                          <center><h5>LEGEND</h5></center>
                                          <div><font color="ECB6EC"><i class="fas fa-stop"></i></font>&nbsp;Kota Padang</div>
                                          <div><font color="7EBE71"><i class="fas fa-stop"></i></font>&nbsp;Kota Solok</div>
                                          <div><font color="445D67"><i class="fas fa-stop"></i></font>&nbsp;Kota Sawahlunto</div>
                                          <div><font color="7AFABA"><i class="fas fa-stop"></i></font>&nbsp;Kota Padang Panjang</div>
                                          <div><font color="FD782B"><i class="fas fa-stop"></i></font>&nbsp;Kota Bukittinggi</div>
                                          <div><font color="DABADA"><i class="fas fa-stop"></i></font>&nbsp;Kota Payakumbuh</div>
                                          <div><font color="B575B5"><i class="fas fa-stop"></i></font>&nbsp;Kota Pariaman</div>
                                          <div><font color="677567"><i class="fas fa-stop"></i></font>&nbsp;Kab. Kep. Mentawai</div>
                                          <div><font color="8D75A8"><i class="fas fa-stop"></i></font>&nbsp;Kab. Pesisir Selatan</div>
                                          <div><font color="ECB6EC"><i class="fas fa-stop"></i></font>&nbsp;Kab. Solok</div>
                                          <div><font color="DFB5A7"><i class="fas fa-stop"></i></font>&nbsp;Kab. Sijunjung</div>
                                          <div><font color="61B65A"><i class="fas fa-stop"></i></font>&nbsp;Kab. Tanah Datar</div>
                                          <div><font color="E1BC5A"><i class="fas fa-stop"></i></font>&nbsp;Kab. Padang Pariaman</div>
                                          <div><font color="F9F977"><i class="fas fa-stop"></i></font>&nbsp;Kab. Agam</div>
                                          <div><font color="A675A6"><i class="fas fa-stop"></i></font>&nbsp;Kab. Lima Puluh Kota</div>
                                          <div><font color="67F5E7"><i class="fas fa-stop"></i></font>&nbsp;Kab. Pasaman</div>
                                          <div><font color="B79E7E"><i class="fas fa-stop"></i></font>&nbsp;Kab. Solok Selatan</div>
                                          <div><font color="E775E7"><i class="fas fa-stop"></i></font>&nbsp;Kab. Dharmasraya</div>
                                          <div><font color="E7E167"><i class="fas fa-stop"></i></font>&nbsp;Kab. Pasaman Barat</div>
                                        </div>
                                    <div id="morris-area-example" class="morris-charts morris-chart-height"></div>

                                </div>
                            </div>
                        </div> -->
                        <!-- end col -->                   
                        
    <?php
      $sql=pg_query("SELECT * FROM data_sumbar AS S
                      join jenis AS j on S.id_jenis=j.id_jenis
                      order by S.id_jenis");
      $n=0;$m=0;$t=0;
      $nama_jenis="null";
      while ($data=pg_fetch_assoc($sql)) {
        if ($nama_jenis != $data['nama_jenis']) {
          $m=$m+1;
          $n=0;
        }
        $nama_jenis = $data['nama_jenis']; $tahun = $data['tahun'];
        $jenis[$m] = $nama_jenis;
        $tahun[$m] = $data['tahun'];
        $satuan[$m] = $data['satuan'];
        $hasil[$n][$m] = $data['hasil'];
        //echo "(".$n.")"."(".$m.")"."=".$data['hasil']."<br/>";
        $n=$n+1;
        $t=$t+1;
      }

    $i=1;
 
    ?>


    <div class="col-xl-12">
      <div class="card m-b-30">
          <div class="card-body">
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>
        </div>
      </div>
      		<script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Produksi Sumbar Per Tahun'
    },

    subtitle: {
        text: '_'
    },

    yAxis: {
        title: {
            text: 'Jumlah Produksi'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [<?php
          $i=0;$a=1;
          while ($i<$m) {
            if ($i==$m-1) {
              $a=1;
            }
            if ($i<$m-1) {
              echo "
                {
                name: '".$jenis[$a]."',
                data: [";
                              $z=0;
                              while ($z<5) {
                                //echo "test123"; echo $m; echo $i; echo $batas-1;echo "<br/>";
                                if ($z<$m) {
                                  echo $hasil[$z][$a].",";
                                }
                                else {
                                  echo $hasil[$z][$a];
                                }
                                $z++;
                              } 
              echo "
                    ] 
                  },
              ";
            }
            else {
              echo "
                {
                name: '".$jenis[$i]."',
                data: [";
                             $z=0;
                              while ($z<5) {
                                //echo "test123"; echo $m; echo $i; echo $batas-1;echo "<br/>";
                                if ($z<$m) {
                                  echo $hasil[$z][$a].",";
                                }
                                else {
                                  echo $hasil[$z][$a];
                                }
                                $z++;
                              } 
              echo "
                    ] 
                } ]
              ";
            }
            $i++;$a++;
          } 
        ?>,

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
<?php

 // echo $m;
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
                © 2019 <span class="d-none d-sm-inline-block"> - Universitas Andalas</span>.
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


    <!-- App js -->
    <script src="assets/js/app.js"></script>

<!--  -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&callback=initMap"
async defer></script> -->

</body>


<!-- Mirrored from themesdesign.in/stexo/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2019 02:08:43 GMT -->
</html>