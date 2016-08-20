<?php 
mysql_connect("localhost","root","toor");
mysql_select_db("list_c");
$proxy ="130.185.81.139:3128";
$count=0;
//country();
state("146669");
$ip_a=0;
function get_ip($ip1){
	global $ip_a;
 
  $ip= array("66.228.47.169:8118",
				"177.21.227.129:8080",
				"202.77.123.38:5555",
				"79.172.227.238:8080",
				"91.83.69.146:8080");  // Get the IP address of the visitor
  $ip_exp=explode(":",$ip[$ip1]);
  $result = system('ping -n 1 '.$ip_exp[0], $retval); // the result contains the last line of the ping command.
// echo $ip_a;
if ($retval==0){
  return $ip[$ip1];
}  
	return get_ip($ip_a++);
}
function country(){
    $i=0;
	
    $ch = curl_init();
    if($ch === false)
    {
        die('Failed to create curl object');
    }
	$timeout = 5;
	$url="http://www.geonames.org/childrenJSON?geonameId=6255148&style=long&maxRows=100000";
	global $proxy;
	global	$count;
	global $ip_a;
	if($count==1950){
	    $proxy =get_ip($ip_a++);
		$count=0;
	}else{
		 $count++;
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $t = curl_exec($ch);
    curl_close($ch);
 // $t=file_get_contents("http://www.geonames.org/childrenJSON?geonameId=6255148&style=long&maxRows=100000");
  $r=json_decode($t,true);
  $tot=$r['totalResultsCount'];
  while($i<$tot){
	  if(mysql_query("INSERT INTO `country_europe`(`id`,`continent`, `adminCode1`, `lng`, `geonameId`, `toponymName`, `countryId`, `fcl`, `countryCode`, `name`, `fclName`, `countryName`, `fcodeName`, `adminName1`, `lat`, `fcode`) VALUES ('','6255148','".str_replace("'","\'",$r['geonames'][$i]['adminCode1'])."','".str_replace("'","\'",$r['geonames'][$i]['lng'])."','".str_replace("'","\'",$r['geonames'][$i]['geonameId'])."','".str_replace("'","\'",$r['geonames'][$i]['toponymName'])."','".str_replace("'","\'",$r['geonames'][$i]['countryId'])."','".str_replace("'","\'",$r['geonames'][$i]['fcl'])."','".str_replace("'","\'",$r['geonames'][$i]['countryCode'])."','".str_replace("'","\'",$r['geonames'][$i]['name'])."','".str_replace("'","\'",$r['geonames'][$i]['fclName'])."','".str_replace("'","\'",$r['geonames'][$i]['countryName'])."','".str_replace("'","\'",$r['geonames'][$i]['fcodeName'])."','".str_replace("'","\'",$r['geonames'][$i]['adminName1'])."','".str_replace("'","\'",$r['geonames'][$i]['lat'])."','".str_replace("'","\'",$r['geonames'][$i]['fcode'])."')") or die(mysql_error())) {
		
	 }
	state(str_replace("'","\'",$r['geonames'][$i]['geonameId']));
	$i++;
	 echo "success data";
	 echo $count."\n";
  }
  return "yes";
} 
  
function state($gnid){
	echo "I am done insert country let start state\n\n";
  $i=0;
 // $ty=mysql_query("select distinct geonameId from country_europe where continent!=''");
 // while($tv=mysql_fetch_array($ty)){
	//  echo $tv['geonameId'];
	$ch = curl_init();
    if($ch === false)
    {
        die('Failed to create curl object');
    }
	$timeout = 5;
	$url="http://www.geonames.org/childrenJSON?geonameId=".$gnid."&style=long&maxRows=100000";
	global $proxy;
	global	$count;
	global $ip_a;
	if($count==1700){
	    $proxy =get_ip($ip_a++);
		$count=0;
	}else{
		$count++;
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $t1 = curl_exec($ch);
    curl_close($ch);
// $t1=file_get_contents("http://www.geonames.org/childrenJSON?geonameId=".$gnid."&style=long&maxRows=100000");
  $r1=json_decode($t1,true);
  $tot1=$r1['totalResultsCount'];
  while($i<$tot1){
	  if(mysql_query("INSERT INTO `country_europe`(`id`,`country_code`, `adminCode1`, `lng`, `geonameId`, `toponymName`, `countryId`, `fcl`, `countryCode`, `name`, `fclName`, `countryName`, `fcodeName`, `adminName1`, `lat`, `fcode`) VALUES ('','".$gnid."','".str_replace("'","\'",$r1['geonames'][$i]['adminCode1'])."','".str_replace("'","\'",$r1['geonames'][$i]['lng'])."','".str_replace("'","\'",$r1['geonames'][$i]['geonameId'])."','".str_replace("'","\'",$r1['geonames'][$i]['toponymName'])."','".str_replace("'","\'",$r1['geonames'][$i]['countryId'])."','".str_replace("'","\'",$r1['geonames'][$i]['fcl'])."','".str_replace("'","\'",$r1['geonames'][$i]['countryCode'])."','".str_replace("'","\'",$r1['geonames'][$i]['name'])."','".str_replace("'","\'",$r1['geonames'][$i]['fclName'])."','".str_replace("'","\'",$r1['geonames'][$i]['countryName'])."','".str_replace("'","\'",$r1['geonames'][$i]['fcodeName'])."','".str_replace("'","\'",$r1['geonames'][$i]['adminName1'])."','".str_replace("'","\'",$r1['geonames'][$i]['lat'])."','".str_replace("'","\'",$r1['geonames'][$i]['fcode'])."')") or die(mysql_error())) {
		
	 }
	 city(str_replace("'","\'",$r1['geonames'][$i]['geonameId']));
	 echo $i++."\n";
  }
  
  echo "state ".$count."\n\n";
//}
return "yes";
}

//county/region/city
function city($gnid){
echo "I am done insert state let start region\n\n";
  $i=0;
 // $ty2=mysql_query("select distinct geonameId from country_europe where country_code!=''");
//  while($tv2=mysql_fetch_array($ty2)){
	$ch = curl_init();
    if($ch === false)
    {
        die('Failed to create curl object');
    }
	$timeout = 5;
	$url="http://www.geonames.org/childrenJSON?geonameId=".$gnid."&style=long&maxRows=100000";
	global $proxy;
	global	$count;
	global $ip_a;
	if($count==1700){
	    $proxy =get_ip($ip_a++);
		$count=0;
	}else{
		$count++;
	}
	
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $t2 = curl_exec($ch);
    curl_close($ch);
	
 // $t2=file_get_contents("http://www.geonames.org/childrenJSON?geonameId=".$gnid."&style=long&maxRows=100000");
  $r2=json_decode($t2,true);
  $tot2=$r2['totalResultsCount'];
  while($i<$tot2){
	  if(mysql_query("INSERT INTO `country_europe`(`id`,`state_code`, `adminCode1`, `lng`, `geonameId`, `toponymName`, `countryId`, `fcl`, `countryCode`, `name`, `fclName`, `countryName`, `fcodeName`, `adminName1`, `lat`, `fcode`) VALUES ('','".$gnid."','".str_replace("'","\'",$r2['geonames'][$i]['adminCode1'])."','".str_replace("'","\'",$r2['geonames'][$i]['lng'])."','".str_replace("'","\'",$r2['geonames'][$i]['geonameId'])."','".str_replace("'","\'",$r2['geonames'][$i]['toponymName'])."','".str_replace("'","\'",$r2['geonames'][$i]['countryId'])."','".str_replace("'","\'",$r2['geonames'][$i]['fcl'])."','".str_replace("'","\'",$r2['geonames'][$i]['countryCode'])."','".str_replace("'","\'",$r2['geonames'][$i]['name'])."','".str_replace("'","\'",$r2['geonames'][$i]['fclName'])."','".str_replace("'","\'",$r2['geonames'][$i]['countryName'])."','".str_replace("'","\'",$r2['geonames'][$i]['fcodeName'])."','".str_replace("'","\'",$r2['geonames'][$i]['adminName1'])."','".str_replace("'","\'",$r2['geonames'][$i]['lat'])."','".str_replace("'","\'",$r2['geonames'][$i]['fcode'])."')") or die(mysql_error())) {
		
	 }
	 town(str_replace("'","\'",$r2['geonames'][$i]['geonameId']));
	 echo $i++."\n";
  }
  echo "city ".$count."\n\n";
//}
return "yes";
}

function town($gnid){
	echo "I am done insert city let start town\n\n";
  $i=0;
  
//  $ty3=mysql_query("select distinct geonameId from country_europe where state_code!=''");
//  while($tv3=mysql_fetch_array($ty3)){
	  $ch = curl_init();
     
    if($ch === false)
    {
        die('Failed to create curl object');
    }
	$timeout = 5;
	$url="http://www.geonames.org/childrenJSON?geonameId=".$gnid."&style=long&maxRows=100000";
	global $proxy;
	global	$count;
	global $ip_a;
	if($count==1700){
	    $proxy =get_ip($ip_a++);
		$count=0;
	}else{
		$count++;
	}
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $t3 = curl_exec($ch);
    curl_close($ch);
	
 // $t3=file_get_contents("http://www.geonames.org/childrenJSON?geonameId=".$tv3['geonameId']."&style=long&maxRows=100000");
  $r3=json_decode($t3,true);
  $tot3=$r3['totalResultsCount'];
  while($i<$tot3){
	  if(mysql_query("INSERT INTO `country_europe`(`id`,`city_codee`, `adminCode1`, `lng`, `geonameId`, `toponymName`, `countryId`, `fcl`, `countryCode`, `name`, `fclName`, `countryName`, `fcodeName`, `adminName1`, `lat`, `fcode`) VALUES ('','".$gnid."','".str_replace("'","\'",$r3['geonames'][$i]['adminCode1'])."','".str_replace("'","\'",$r3['geonames'][$i]['lng'])."','".str_replace("'","\'",$r3['geonames'][$i]['geonameId'])."','".str_replace("'","\'",$r3['geonames'][$i]['toponymName'])."','".str_replace("'","\'",$r3['geonames'][$i]['countryId'])."','".str_replace("'","\'",$r3['geonames'][$i]['fcl'])."','".str_replace("'","\'",$r3['geonames'][$i]['countryCode'])."','".str_replace("'","\'",$r3['geonames'][$i]['name'])."','".str_replace("'","\'",$r3['geonames'][$i]['fclName'])."','".str_replace("'","\'",$r3['geonames'][$i]['countryName'])."','".str_replace("'","\'",$r3['geonames'][$i]['fcodeName'])."','".str_replace("'","\'",$r3['geonames'][$i]['adminName1'])."','".str_replace("'","\'",$r3['geonames'][$i]['lat'])."','".str_replace("'","\'",$r3['geonames'][$i]['fcode'])."')") or die(mysql_error())) {
		
	 }
	 echo $i++."\n";
  }
 echo "town ".$count."\n";
//}
return "yes";
}

?>