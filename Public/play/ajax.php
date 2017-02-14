<?php
error_reporting(0);
header("Content-Type: text/json; charset=utf-8");
$ur='http://www.dongting.com/ajax/v1.ard.tj.itlily.com/';
define(APP,$ur);$type=$_REQUEST["type"];
if($type){$type=strtolower($type);
	if($type=='poster'){$url=APP.'index/poster';
	}elseif($type=='album'){$sys=$_SERVER['QUERY_STRING'];
		$sys=str_ireplace('type=album&','',strval($sys));
		$url=APP.'ttpod?'.$sys;
	}$page=getbody($url);if($page)echo $page;}
function getbody($url){$ch=curl_init();curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);curl_setopt($ch,CURLOPT_REFERER,$url);
@$file=curl_exec($ch);curl_close($ch);return $file;}
?>