<?php

function getPageLink($html)
{
	preg_match("/class=\"ptt\".*?table>/",$html,$matche);
	// var_dump($matche);
	
	//匹配到页面列表html
	$tableData = $matche[0];
	
	//匹配翻页html url
	preg_match_all("/document.location=this.firstChild.href\".*?a href\=\"(.*?)\".*?>[1-9].*?a><\/td>/",$tableData,$matche2);
	$pageList = $matche2[1];
	
	//去掉第一页，因为一进来就是用第一页的页面
	foreach($pageList as $key=>$page){
		if(strpos($page, "p=1")){
			unset($pageList[$key]);
		}
	}
	
	// var_dump($pageList);
	
	return $pageList;
	
}

function getPicPackageName($html)
{
	preg_match("/<h1 id=\"gn\">(.*?)<\/h1>/",$html,$match);
	return $match[1];
}