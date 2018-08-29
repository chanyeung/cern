<?php
/*explode 는 문자열을 문자열로 나눕니다.
 *-설명 : array explode(string $delimiter, string $string[,int $limit])
 * delimiter 문자열을 경계로 나누어진 string의 문자열로 이루어지는 배열을 반환합니다.
 *-인수 :
 delimte 경계문자열.
 string 입력 문자열
 limit를 지정하면, 반환하는 배열은 최대 limit개의 원소를 가지며, 마지막 원소는 남은 string모두를 포함합니다.
 *-반환값 : delimiter가 빈 문자열("")dlaus, explode()은 False를 반환합니다. delimiter가 string에 존재하지 않으면, explode()는 string을 포함하는 배열을 반환합니다.
 */

/*
timon category
<button id="_btnShowCategoryList" ~ <div id="_popularWrap"
*/
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

//Then, after your curl_exec call;
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);

//예제1
$headCutBody = explode("id=\"gnb2\"", $body);
$tailCutBody = explode("li class=\"swiper-slide\"", $headCutBody[1]);
echo "<xmp>";
print_r($tailCutBody[0]);
echo "</xmp>";
/*
//예제2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell)=explode(":", $data);
echo '<br>' . $user;
echo '<br>' .  $pass;
echo '<br>' . $uid;
echo '<br>' . $gid;
echo '<br>' . $gecos;
echo '<br>' .  $home;
echo '<br>' . $shell;
*/
?>
