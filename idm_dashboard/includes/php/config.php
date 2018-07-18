<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('html_errors','1');
ini_set('log_errors','1');
ini_set('track_errors','1');
ini_set('variables_order','GPCS');
ini_set('max_execution_time', 300);
error_reporting(E_ALL ^ E_DEPRECATED);
// NOC connection parameters
date_default_timezone_set("UTC");
$nocAddr = 'http://10.55.156.75:8084/wsapi/services/Moswsapi_1_1?wsdl';
$nocUser = 'admin';
$nocPass = 'formula';
$nocPass = base64_encode(hash('md5',$nocPass,true));
$memAddr = 'localhost';
$memPort = '11611';
$memExpi = 4;
$root = "MetricasIDM=MetricasIDM/root=Elements";
$timeOffset = 24*60*60;
$seriesNames=array("Drivers"=>array());
$alarmsDNs=array();
?>