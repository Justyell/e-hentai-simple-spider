<?php

include_once "curl.php";

function downloadPic($realPageUrl)
{
	$html = geturl($realPageUrl);
	
	preg_match("/div id=\"i3\".*?<img id=\"img\" src=\"(.*?)\"/", $html, $match);
	
	$picUrl = $match[1];
	
	$imgData = geturl($picUrl);
	
	if(strpos($picUrl, ".jpg")){
		return [
			"data"	=>	$imgData,
			"type"	=>	"jpg",
		];
	}
	
	if(strpos($picUrl, ".jpeg")){
		return [
			"data"	=>	$imgData,
			"type"	=>	"jpeg",
		];
	}
	
	if(strpos($picUrl, ".png")){
		return [
			"data"	=>	$imgData,
			"type"	=>	"png",
		];
	}
	
	if(strpos($picUrl, ".bmp")){
		return [
			"data"	=>	$imgData,
			"type"	=>	"bmp",
		];
	}
	
	throw new Exception("not know type about {$picUrl}");
	
}