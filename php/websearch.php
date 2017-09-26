<?php 

include("Db.php");
include("Response.php");

$db = Db::getInstance();
$dbc = $db->connect();
$keyword = $_GET[keyword];
if($keyword){
	$sql = <<<EFO
	SELECT webname,webaddress,imgpath FROM `wco_web_mains` WHERE webname LIKE '{$keyword}%' OR webabb LIKE '{$keyword}%' OR shouzimuabb LIKE '{$keyword}%'OR fullpinyin LIKE '{$keyword}%' ORDER BY number LIMIT 30;
EFO;
$stme = $dbc->query($sql);
$res = $stme->fetchAll(PDO::FETCH_ASSOC);
$type = $_GET[format];
Response::show(200,'success',$res,$type);
}




