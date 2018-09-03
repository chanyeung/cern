<!DOCTYPE html>
<html>
<head>
<style>
table, tr, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding : 5px;
	text-align :left;
}
</style>
</head>
<body>
<form>
	chose your favoite subject;
	<br>
	<button name="sort" type="submit" value="name">sort by name</button>
	<button name="sort" type="submit" value="price">sort by price</button>
</form>
</body>
</html>
<?php
$ch = curl_init("http://browse.auction.co.kr/list?category=12230000");
//$ch = curl_init("https://www.ticketmonster.co.kr/");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);


//check for execution errors
if(!$response=curl_exec($ch))
{
	echo 'Scrapper error : ' . curl_error($ch);
	exit;
}
//match1 = name
preg_match_all('/>상품명 <\/span><span class="text--title">\s?(.*?)<!-- --> <\/span>/', $response, $match1);
//match2 = price
preg_match_all('/<strong class="text--price_seller">([\d,]*?)<\/strong>/', $response, $match2);
//match3 = num
preg_match_all('/ItemNo=(.*?)&SellerID=/', $response, $match3);
preg_match_all('/{"design":\d*,"viewModel":{"itemNo":"(.*?)",/', $response, $match33);

foreach ($match3[1] as $key => $value) {
	$match['name'][$key]=$match1[1][$key];
	$match['price'][$key]=preg_replace("/(.*?),(.*?)/", "$1$2", $match2[1][$key]);
	$match['num'][$key]=$match3[1][$key];
	if($value==""){
		//echo $key . "<br>";
		$match['num'][$key]=$match33[1][$key];
	}
}

$sort ='name';
if(isset($_GET['sort'])){
	if($_GET['sort']=="name"){
		// echo "sorting by name" . "<br>";
		asort($match['name'],SORT_STRING);
		
	}else if($_GET['sort']=="price"){
		// echo "sorting by price" . "<br>";
		asort($match['price']);
		$sort ='price';
	}
}

echo "<br>" . "<table><tr><td>Product Name</td><td>Price</td><td>Product Number</td></tr>";
foreach ($match[$sort] as $key => $value) {
	echo "<tr><td><a href=http://itempage3.auction.co.kr/DetailView.aspx?itemno=" .  $match['num'][$key] . ">";
	echo $match['name'][$key] . "</a></td>";
	echo "<td>" . $match['price'][$key] . "</td><td>" . $match['num'][$key] . "</td><tr>";
}	
echo "</table>";



// echo "<xmp>";
// print_r($match);
// echo "/<xmp>";
?>
