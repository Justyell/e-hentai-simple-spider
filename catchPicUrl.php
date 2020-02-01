<?php

function getPageImageInnerPageUrl($html)
{
	preg_match_all("/div class=\"gdtm\".*?<a href=\"(.*?)\"><img/", $html, $matcher);
	
	return $matcher[1];
	
}