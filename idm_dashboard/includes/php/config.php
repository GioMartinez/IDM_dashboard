<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('html_errors','1');
ini_set('log_errors','1');
ini_set('track_errors','1');
ini_set('variables_order','GPCS');
error_reporting(E_ALL ^ E_DEPRECATED);
// NOC connection parameters
date_default_timezone_set("UTC");
$nocAddr = 'http://10.56.184.7:8084/wsapi/services/Moswsapi_1_1?wsdl';
$nocUser = 'admin';
$nocPass = 'formula';
$nocPass = base64_encode(hash('md5',$nocPass,true));
$memAddr = 'localhost';
$memPort = '11611';
$memExpi = 4;
$root = "MetricasIDM=MetricasIDM/root=Elements";
$timeOffset = 30*24*60*60;
$seriesNames=array(
	"fiel"=>array(
		"revocados"=>array(
			"DN"=>"FielCont=AuthFielCont/AuthFielCont=AuthFielCont/UIFAuthFielCont=UIFAuthFielCont/root=Elements",
			"value"=>"Revocados",
			"profile"=>"AuthFiel"
		),
		"noautenticados"=>array(
			"DN"=>"FielCont=AuthFielCont/AuthFielCont=AuthFielCont/UIFAuthFielCont=UIFAuthFielCont/root=Elements",
			"value"=>"NOAutenticados",
			"profile"=>"AuthFiel"
		)
	)
)
?>