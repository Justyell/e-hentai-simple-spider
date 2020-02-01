<?php

include_once "getPage.php";
include_once "catchPicUrl.php";
include_once "curl.php";
include_once "downloadPic.php";

$url = $argv[1];
$html = geturl($url);

//page1
$pageUrl = getPageLink($html);
//page1 pictures
$picList = getPageImageInnerPageUrl($html);
$fileName = getPicPackageName($html);
//filter '/' because is a path symbol
$fileName = str_replace("/"," ", $fileName);
mkdir($fileName);

$picCount = 0;
$pageNum = 0;
while(true){
	if($pageNum==0){
		foreach($picList as $pic){
			$data = downloadPic($pic);
			file_put_contents("{$fileName}/".$picCount++.".".$data['type'], $data['data']);
		}
		if(count($pageUrl) == 0){
			break;
		}
	}else{
		if($pageNum >= count($pageUrl)){
			break;
		}
		$nextPageHtml = geturl($pageUrl[$pageNum++]);
		$nextPageList = getPageImageInnerPageUrl($nextPageHtml);
		foreach($nextPageList as $pic){
			$data = downloadPic($pic);
			file_put_contents("{$fileName}/".$picCount++.".".$data['type'], $data['data']);
		}
	}
	
}


echo "DOWNLOAD OK!\n";

