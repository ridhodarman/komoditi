<?php
include('koneksi.php');
$sql  = "SELECT  
			ST_AsGeoJSON(geom)::json As geometry,
			gid,
			kabkot
		FROM indo_kab_kot
		";
		$geojson = array(
			'type'      => 'FeatureCollection',
			'features'  => array()
		);
		$query = pg_query($sql);
		if(pg_num_rows($query)==0) return 0;
		while($rows=pg_fetch_assoc($query)){
			$feature = array(
				"type" => 'Feature',
				'geometry' => json_decode($rows['geometry'], true),
				'jenis' => "kota/kab",
				'properties' => array(
					'id' => $rows['gid'],
					'nama' => $rows['kabkot']
				)
			);
			array_push($geojson['features'], $feature);
		}
		echo json_encode($geojson);