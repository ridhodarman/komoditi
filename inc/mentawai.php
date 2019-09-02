

<?php
require '../koneksi.php';
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(city_place.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT city_place.nama,ST_X(ST_Centroid(city_place.geom)) 
				AS lon, ST_Y(ST_CENTROID(city_place.geom)) As lat) As l )) As properties 
				FROM kab_kota As city_place WHERE city_place.gid=61
				) As f ) As fc ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>