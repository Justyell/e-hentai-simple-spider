<?php

function geturl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
	curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1");
	curl_setopt($ch, CURLOPT_PROXYPORT, "1080");
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}