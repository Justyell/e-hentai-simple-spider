<?php

function getPageLink($html)
{
	preg_match("/class=\"ptt\".*?table>/",$html,$matche);
	// var_dump($matche);
	
	//匹配到页面列表html
	$tableData = $matche[0];
	
	//匹配翻页html url
	preg_match_all("/document.location=this.firstChild.href\".*?a href\=\"(.*?)\".*?>[0-9]+.*?a><\/td>/",$tableData,$matche2);
	$pageList = $matche2[1];
	
	if(count($pageList) == 0){
		return $pageList;
	}
	
	//由于页面不是显示所有页面链接，因此需要获取最后一页的数字
	$biggestPageUrl = end($pageList);
	preg_match("/p=([0-9]+)/", $biggestPageUrl, $match);
	$biggestPageNum = $match[1];
	//重新构造页面分页链接
	$list = [];
	for($i=1;$i<=$biggestPageNum;$i++){
		$afterChange = preg_replace("/p=([0-9]+)/", "p=".$i, $biggestPageUrl);
		$list[] = $afterChange;
	}
	
	return $list;
	
}

function getPicPackageName($html)
{
	preg_match("/<h1 id=\"gn\">(.*?)<\/h1>/",$html,$match);
	return $match[1];
}