<?php
 function doGeo($ad1,$ad2){
	$or = implode('+',explode(" ",$ad1));
	$des = implode('+',explode(" ",$ad2));
	$url="http://maps.googleapis.com/maps/api/directions/json?origin=$or&destination=$des&alternatives=true&mode=driving&avoid=tolls,highways&sensor=false";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response,true);
	 return $response_a;
}
$r=doGeo("Meerut, Uttra Pradesh, india","Delhi, india");
$dis=$r->routes[0]->legs->distance->text;
echo $dis;
?>