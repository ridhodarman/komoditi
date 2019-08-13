<!DOCTYPE html>
<html>
<head>
	<script src="inc/code/highcharts.js"></script>
	<script src="inc/code/modules/exporting.js"></script>
	<script src="inc/code/modules/export-data.js"></script>
	<title></title>
	<?php include('koneksi.php'); ?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div id="map" style="width: 100%; height: 500px"></div>
<?php
                    $sql=pg_query("SELECT id_jenis, nama_jenis FROM jenis");
                    $no=1;
                    while ($data=pg_fetch_assoc($sql)) {
                    	$jenis = $data['nama_jenis'];
              ?>

<div id="container<?php echo $no ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div style="width: 100%; background-color: pink">
	.
</div>


		<script type="text/javascript">
Highcharts.chart('container<?php echo $no ?>', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<?php echo $jenis ?>'
    },
    subtitle: {
        text: 'Source: BPS'
    },
    xAxis: {
        categories: [
            <?php
                    $sql2=pg_query("SELECT kabkot FROM indo_kab_kot order by gid");
                    while ($data2=pg_fetch_assoc($sql2)) {
                    	echo "'".$data2['kabkot']."'".",";
                    }
                    echo "'-'";
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Produksi'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} satuannya?</b></td></tr>',
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
    series: [{
        name: '<?php echo $jenis ?>',
        data: [<?php
                    $sql3=pg_query("SELECT * FROM hasil where id_jenis = '$no'  order by gid");
                    while ($data3=pg_fetch_assoc($sql3)) {
                        echo $data3['jumlah'].",";
                    }
                    echo "0";
            ?>]

    }]
});
		</script>
<?php
$no=$no+1;
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
		    zoom: 14.5,
		    mapTypeId: 'satellite'
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

        digitkota[nkota] = new google.maps.Polygon({
          paths: hitungTitik,
          strokeColor: 'yellow',
          strokeOpacity: 2,
          strokeWeight: 0.5,
          //fillColor: '#B22222',
          fillColor: 'brown',
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