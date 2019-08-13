<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="js/Chart.js"></script>
	<title></title>
	<?php include('koneksi.php'); ?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div id="map" style="width: 100%; height: 400px"></div>
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
    <div > 
      <br/>
      <div style="width: 100%; background-color: yellow"><marquee><<<</marquee></div>
      <center><h1><?php echo $jenis ?></h1></center>
      <canvas id="myChart<?php echo $no ?>"></canvas>
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
</body>
</html>
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