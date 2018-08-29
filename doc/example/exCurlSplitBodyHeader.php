<?php
	$ch = curl_init("https://www.ticketmonster.co.kr/deal/1450043222?reason=er&etype=nc&useArtistchaiRegion=Y");
	//$ch = curl_init("https://www.ticketmonster.co.kr/");
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);

	$response=curl_exec($ch);

	if(curl_errno($ch))	//check for execution errors
	{
		echo 'Scrapper error : ' . curl_error($ch);
		// exit;
		echo '<br>';
	}

	//Ten, after your curl_exec call;
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($response, 0, $header_size);
	$body = substr($response, $header_size);

	//close curl resuorce, and free up system resources
	curl_close($ch);

	echo "<xmp>";
	print_r($body);
	echo "</xmp>";

	$category1 = '/<h3[^>]*class=\"title\"[^>]*>([^!.]*)<\/h3>/im';
	
	if(preg_match_all($category1, $body, $list)){
		$category2 = '';
		echo "<xmp>";
		print_r($list);
		echo "</xmp>";
	}else{
		echo "Not found";
	}
	
?>
