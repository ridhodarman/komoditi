<?php
require '../koneksi.php';
$prov = $_GET["prov"];
// $tahun = $_GET["tahun"];
// $kategori = $_GET["kategori"];
$querysearch = "SELECT J.nama_jenis, H.jumlah, ST_X(ST_Centroid(S.geom)) AS lng, ST_Y(ST_CENTROID(S.geom)) AS lat
				FROM hasil AS H
				JOIN jenis AS J ON H.id_jenis=J.id_jenis
				JOIN kab_kota AS S ON S.gid=H.gid
				WHERE H.gid='$prov' and J.id_kategori='2'";
$hasil = pg_query($querysearch);
$n=0;
while ($row = pg_fetch_array($hasil)) {
    $longitude = $row['lng'];
    $latitude = $row['lat'];
    $nama[$n] = $row['nama_jenis'];
    $jumlah[$n] = $row['jumlah'];
    $n++;
}
$querysearch = "SELECT J.nama_jenis, H.jumlah, ST_X(ST_Centroid(S.geom)) AS lng, ST_Y(ST_CENTROID(S.geom)) AS lat
				FROM hasil AS H
				JOIN jenis AS J ON H.id_jenis=J.id_jenis
				JOIN kab_kota AS S ON S.gid=H.gid
				WHERE H.gid='$prov' and J.id_kategori='3'";
$hasil = pg_query($querysearch);
while ($row = pg_fetch_array($hasil)) {
    $longitude = $row['lng'];
    $latitude = $row['lat'];
    $nama[$n] = $row['nama_jenis'];
    $jumlah[$n] = $row['jumlah'];
    $n++;
}
$i=0;
$text="";
while($i<$n){
	$text = $text."<br>".$nama[$i].": ".$jumlah[$i]."<br/>";
	$i++;	
}
$dataarray[] = array('text' => $text, 'longitude' => $longitude, 'latitude' => $latitude);
echo json_encode($dataarray);