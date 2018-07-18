<?php
include_once'config.php';
include_once'nocInt.php';
include_once'memInt.php';
$NOC=new NOCface($nocAddr,$nocUser,$nocPass);
$cache=new Cache($memAddr,$memPort,$memExpi);
function getAlarms(){
	global$NOC;
	global$cache;
	global$alarmsDNs;
	foreach($alarmsDNs as $key=>$element){
		$temp=$NOC->getAlarms($element['dname']);
		$alarmsDNs[$key]+=array("alarms"=>array());
		foreach($temp['fields']['fields']as$key2=>$alarms){
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Size')?array("Size"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_Add')?array("Subscriber_Add"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_Delete')?array("Subscriber_Delete"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_Rename')?array("Subscriber_Rename"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_modify')?array("Subscriber_modify"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_Cache_Add')?array("Subscriber_Cache_Add"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Subscriber_Cache_Modify')?array("Subscriber_Cache_Modify"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='PublisherCR_Instance')?array("PublisherCR_Instance"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='PublisherCR_Status')?array("PublisherCR_Status"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Publisher_Reported_Events_Status')?array("Publisher_Reported_Events_Status"=>$alarms['value']):[]);
			$alarmsDNs[$key]['alarms']+=(($alarms['name']=='Publisher_Reported_Events_Query')?array("Publisher_Reported_Events_Query"=>$alarms['value']):[]);
		}
	}
}
function getAllSeries(){
	global$NOC;
	global$cache;
	global$timeOffset;
	global$seriesNames;
	foreach($seriesNames as $graph => $pltfrm){
		foreach($pltfrm as $key => $value){
			$timeOffset=24*60*60;
			$temp=$NOC->mySeries($value['DN'],$timeOffset,$value["value"],$value["profile"]);
			$cache->set($graph."_".$key,$temp);
			$NOC->allSeries=null;
		}
	}
}
function flood($dn,$tree,$depth){
	global$NOC;
	global$cache;
	global$seriesNames;
	global$alarmsDNs;
	$depth=$depth+1;
	if($depth<5){
		$result=$NOC->getChilds($dn);
		if(isset($result['DName'])){
			$tree=array("name"=>$result['displayName']);
			$tree+=array("condition"=>$result['condition']);
			$tree+=array("dname"=>$result['DName']);
			$childRight='includedChildDNames';
			if(isset($result[$childRight]['includedChildDNames'])){
				if(!is_array($result[$childRight]['includedChildDNames'])){
					$tree+=array("children"=>array(0=>""));
					$tree['children'][0]=flood($result[$childRight]['includedChildDNames'],$tree['children'][0],$depth);
					if(empty($tree['children'][0])){unset($tree['children']);}
				}
				else{
					if($childRight == 'includedChildDNames'){
						$tree+=array("children"=>array());
						foreach($result[$childRight]['includedChildDNames']as$key=>$value){
							$tree['children']+=array($key=>"");
							$tree['children'][$key]=flood($value,$tree['children'][$key],$depth);
							if($tree['children'][$key]==''){unset($tree['children'][$key]);}
						}
						if(empty($tree['children'])){unset($tree['children']);}
					}
					else{
						$tree+=array("children"=>array());
						foreach($result[$childRight]['includedChildDNames']as$key=>$value){
							$tree['children']+=array($key=>"");
							$tree['children'][$key]=flood($value,$tree['children'][$key],$depth);
							if($tree['children'][$key]==''){unset($tree['children'][$key]);}
						}
						if(empty($tree['children'])){unset($tree['children']);}
					}
				}
			}
			else{
				$alarmsDNs[]=array(
						"name"=>$result['displayName'],
						"condition"=>$result['condition'],
						"dname"=>$result['DName']
				);
				if(isset($result['seriesDescriptors']['seriesDescriptors'])){
					foreach($result['seriesDescriptors']['seriesDescriptors']as$key=>$value){
						$seriesNames['Drivers']+=array($result['displayName']."_".$value['expressionName']=>array(
								"DN"=>$result['DName'],
								"value"=>$value['expressionName'],
								"profile"=>$value['profileName'],
								"name"=>$result['displayName']
						));
					}
				}
			}
		}
	};
	return$tree;
}
$tree=array();
$tree=flood($root,$tree,0);
echo "tree<br>";
echo "<pre>";
print_r($tree);
echo "</pre>";
getAlarms();
echo "Alarms<br>";
echo "<pre>";
print_r($alarmsDNs);
echo "</pre>";
getAllSeries();
$cache->set("alarms",$alarmsDNs);
$cache->set("seriesNames",$seriesNames);
$NOC->untie_from_NOC();
?>