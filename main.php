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

echo "start spider\n";
while(true){
	if($pageNum==0){
		foreach($picList as $pic){
			$data = downloadPic($pic);
			if(empty($data)){
				echo "the picture of {$picCount} get failed\n";
				$picCount++;
				continue;
			}
			file_put_contents("{$fileName}/".$picCount++.".".$data['type'], $data['data']);
		}
		if(count($pageUrl) == 0){
			break;
		}
		$pageNum++;
		echo "page 1 finish\n";
	}else{
		if($pageNum > count($pageUrl)){
			break;
		}
		$pageNotice = $pageNum + 1;
		$nextPageHtml = geturl($pageUrl[$pageNum-1]);
		$nextPageList = getPageImageInnerPageUrl($nextPageHtml);
		foreach($nextPageList as $pic){
			$data = downloadPic($pic);
			file_put_contents("{$fileName}/".$picCount++.".".$data['type'], $data['data']);
		}
		$pageNum++;
		echo "page {$pageNotice} finish\n";
	}
	
}


echo "DOWNLOAD OK!\n";

