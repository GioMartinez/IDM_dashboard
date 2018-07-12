<?php
/*ini_set('display_errors','1');
ini_set('display_startup_errors','1');
ini_set('html_errors','1');
ini_set('log_errors','1');
ini_set('track_errors','1');*/
ini_set('variables_order','GPCS');
#error_reporting(E_ALL ^ E_DEPRECATED);
// NOC connection parameters
date_default_timezone_set("UTC");
$nocAddr = 'http://10.55.184.7:8084/wsapi/services/Moswsapi_1_1?wsdl';
$nocUser = 'admin';
$nocPass = 'formula';
$nocPass = base64_encode(hash('md5',$nocPass,true));
$memAddr = 'localhost';
$memPort = '11611';
$memExpi = 4;
$root = "org=DisponibilidadHW/gen_chart=DyP-Ejecutivo/root=Organizations";
$timeOffset = 30*24*60*60;
$seriesNames=array(
	"expMan"=>array(
		"portal02"=>array(
			"DN"=>"HTTP=001-ServProxyUIF02/server_file=ServProxyUIF02/mgmt_source=Protocol+Synthetic+Tests/admin_analyzer=End+User+Experience/BEM+Root+Element=Experience+Manager/root=Elements",
			"value"=>"tqidnproocce01:6789.ServProxyUIF02.HTTP.001-ServProxyUIF02.ResponseTime",
			"profile"=>"ElementProfile"
		)
	),
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