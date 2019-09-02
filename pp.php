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
                            <!-- <div class="col-sm-12">
                              <center>
                                <h4 class="page-title" style="width: 100%"><?php echo $nama_kategori; ?> Tahun <?php echo $tahun; ?></h4>
                              </center>
                            </div> -->
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
                        </div>
                        <!-- end col -->                   
                        
    <?php
      $sql=pg_query("SELECT id_jenis, nama_jenis, satuan FROM jenis where id_kategori='2' or id_kategori='3' order by id_jenis");
      $no=0;$k=0;$batas=0;$id_jenis="null";$t=0;
      while ($data=pg_fetch_assoc($sql)) {
        $n=0;
        $jenis[$k] = $data['nama_jenis'];
        if ($id_jenis != $data['id_jenis']) {
          $batas=$batas+1;
        }
        $id_jenis = $data['id_jenis'];
        $satuan = $data['satuan'];
        $sql2=pg_query("SELECT H.*, K.nama FROM hasil AS H
                        join kab_kota AS K ON H.gid=K.gid
                        join jenis AS J ON J.id_jenis=H.id_jenis
                        where H.id_jenis = '$id_jenis' order by H.gid");
        while ($data2=pg_fetch_assoc($sql2)) {
            $kabupaten[$n]=$data2['nama'];
            $jumlah[$n][$k]=$data2['jumlah'];
            //echo "(".$n.") "."(".$k.") " . $data2['jumlah']. "<br/>";
            $n++;$t++;
        }
        $no++;$k++;
      }     
    ?>
    <div class="col-xl-12">
      <div class="card m-b-30">
          <div class="card-body">
      <div id="container<?php echo $no ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>
        </div>
      </div>
      		<script type="text/javascript">

Highcharts.chart('container<?php echo $no ?>', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            <?php
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
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah (<?php echo $satuan ?>)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} <?php echo $satuan ?></b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        <?php
          $i=0;
          $nn=$n/2;$a=0;
          while ($i<$nn) {
            if ($i==$n-1) {
              $a=0;
            }
            if ($i<$nn-1) {
              echo "
                {
                name: '".$jenis[$i]."',
                data: [";
                              $m=0;
                              while ($m<$n) {
                                //echo "test123"; echo $m; echo $i; echo $batas-1;echo "<br/>";
                                if ($m<$n-1) {
                                  echo $jumlah[$m][$a].",";
                                }
                                else {
                                  echo $jumlah[$m][$a];
                                }
                                $m++;
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
                              $m=0;
                              while ($m<$n) {
                                //echo "test123"; echo $m; echo $i; echo $batas-1;echo "<br/>";
                                if ($m<$n-1) {
                                  echo $jumlah[$m][$a].",";
                                }
                                else {
                                  echo $jumlah[$m][$a];
                                }
                                $m++;
                              } 
              echo "
                    ] 
                } ]
              ";
            }
            $i++;$a++;
          } 
        ?>

    });
		</script>
    <?php
      echo $n." - ".$t;
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
          mentawai();
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
        var nama = data.properties.nama;
        var link = "<button class='btn btn-info btn-xs fa fa-info-circle' title='View Details' onclick='detailprov("+'"'+data.properties.id+'"'+", "+'"'+data.properties.nama+'"'+")'></button> "+nama;
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
            color='black';
        }
        else if (id=="62") {
            color='red';
        }
        else if (id=="63") {
            color='violet';
        }
        else if (id=="65") {
            color='SpringGreen';
        }
        else if (id=="66") {
            color='#410f01';
        }
        else if (id=="67") {
            color='cyan';
        }
        else if (id=="68") {
            color='purple';
        }
        else if (id=="69") {
            color='#0d223f';
        }
        else if (id=="70") {
            color='MediumBlue';
        }
        else if (id=="71") {
            color='white';
        }
        else if (id=="72") {
            color='DarkOrange';
        }
        else if (id=="73") {
            color='Gold';
        }
        else if (id=="74") {
            color='#8e5f78';
        }
        else if (id=="75") {
            color='LightCoral';
        }
        else if (id=="76") {
            color='Chartreuse';
        }
        else if (id=="77") {
            color='Sienna';
        }
        else if (id=="78") {
            color='#01410f';
        }
        digitkota[nkota] = new google.maps.Polygon({
          paths: hitungTitik,
          strokeColor: 'red',
          strokeOpacity: 2,
          strokeWeight: 0.5,
          //fillColor: '#B22222',
          fillColor: color,
          fillOpacity: 0.7,
          zIndex: 1,
          content: link
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
          //detailprov(id, nama)
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


var markersDua = [];
var infoDua = [];

function detailprov(id,nama) { //menampilkan informasi
  prov=nama;
  hapusInfo();
  console.log("fungsi info marker id= "+id+ " tahun: "+tahun+ " kategori: "+kategori);
    $.ajax({
    url: 'act/detail_pp.php?prov='+id,
    data: "",
    dataType: 'json',
    success: function (rows) {
      for (var i in rows) {
        var row = rows[i];
        var id = row.id;
        var text = row.text;
        var latitude = row.latitude;
        var longitude = row.longitude;
        centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
        marker = new google.maps.Marker({
          position: centerBaru,
          map: map,
          animation: google.maps.Animation.DROP,
        });
        markersDua.push(marker);
        map.setCenter(centerBaru);
        map.setZoom(10);
        infowindow = new google.maps.InfoWindow({
          position: centerBaru,
          content: "<span style=color:black><center><b>" + prov + "</b><p>" + text + "<br></span>",
          pixelOffset: new google.maps.Size(0, -33)
        });
        infoDua.push(infowindow);
        infowindow.open(map);
        klikInfoWindowLahan(id);
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      $('#gagal').modal('show');
      $('#notifikasi').empty();$('#notifikasi').append(xhr.status);
      $('#notifikasi').append(thrownError);
    }
  });
}

function klikInfoWindowLahan(id) {
  google.maps.event.addListener(marker, "click", function () {
    console.log("marker dengan id=" + id + " diklik");
    detailprov(id);
  });

}

function hapusInfo() {
  for (var i = 0; i < infoDua.length; i++) {
    markersDua[i].setMap(null);
    infoDua[i].setMap(null);
  }
}

function mentawai()
{
  cull = new google.maps.Data();
  cull.loadGeoJson('inc/mentawai.php');
  cull.setStyle(function(feature)
  {
    return({
            fillColor: 'black',
            strokeColor: '#f75d5d ',
            strokeWeight: 0.4,
            fillOpacity: 0.8
          });          
  }
  );
  cull.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&callback=initMap"
async defer></script>

</body>


<!-- Mirrored from themesdesign.in/stexo/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2019 02:08:43 GMT -->
</html>