<?php
	
	/*
		super simple counter to keep track of free internal ip:s when creating a new vagrant vm box
		if each vagrant file has its own unique ip it is alot easier to clone the repo containing the vm and just fire it up
		without having to worry about the included ip allready beeing used in another local vagrant vm
		
		author: henrik
		birth date: 8 december 2015
		
		stars from 192.168.56.120
		
		
	*/
	

function getNextIp()
{	
	$fn = 'counter.log';
	$ip = file_get_contents($fn);

	// if counter.log does not exist
	if(!file_get_contents) $ip = '192.168.50.90';	
	
	$ipex = explode('.', $ip);
	$ipex[3] += 1;

	if($ipex[3] == 200)
	{
		$ipex[2] += 1;
		$ipex[3] = 100; 		
	}
	
	$ip = implode('.', $ipex);

	$f = fopen($fn, "w");	
	fwrite($f, $ip);
	fclose($f);

	
	return $ip;
}

// get next!
$i = getNextIp();

?>
<html>
	<head>
		<title>Your new vagrant box ip</title>
		<style>
			html, body {
				margin: 0;
				padding: 0;
				height: 100%;
				width: 100%;
				background-color: #643B0F;
				overflow: hidden;
				margin: 0;
			}
	
			div {
				position: absolute;
				top: 50%; left: 0; right: 0;
				margin: -110px 0 0 0;
				height: 220px;
				text-align: center;
				color: #E4B04A;
				font-family: Arial;
				font-size: 260px;
				line-height: 260px;
				font-weight: bold;
			}
	
			div .ip {
				font-size: 100px;
				line-height: 0px;
			}
		</style>
</head>
<body>
	
<div>
	<span class="ip"><?=$i?></span>
</div>
	
</body>
</html>