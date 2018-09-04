<?php
include 'AutoLoad.php';

//set & exec cURL
$ch="http://browse.auction.co.kr/list?category=12230000";
$myCurl = new MyCurl($ch);
$curlResult = $myCurl->getResponse();

//scrap data with regular expresion
$patternArr = array('name'=>'/>상품명 <\/span><span class="text--title">\s?(.*?)<!-- --> <\/span>/',
					'price'=>'/<strong class="text--price_seller">([\d,]*?)<\/strong>/',
					'num1'=>'/ItemNo=(.*?)&SellerID=/',
					'num2'=>'/{"design":\d*,"viewModel":{"itemNo":"(.*?)",/');
foreach ($patternArr as $key => $value) {
	//echo $key.'<br>';
	$matchArr = new MatchArr($value, $curlResult);
	$matchArr->getArr($resultArr[$key]);
}

echo "<xmp>";
print_r($resultArr);
echo "</xmp>";
?>
