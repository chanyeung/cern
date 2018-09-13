<?php
//로그인페이지에서 hidden되어있는 token값 가져오기
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.schneidersports.com/member/login.asp?c_redirect=");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);


/*//curl 반환값의 인코딩 확인하여 utf-8로 변경 
if(function_exists('mb_detect_encoding')){
	$encType = mb_detect_encoding($result,"EUC-KR, UTF-8, ASCII");
	if($encType=="EUC-KR"){
		$result = iconv("EUC-KR", "UTF-8", $result);
	}
}else{
	echo "function not exists";
}	*/
$pass = 'a0000';
preg_match("/id=\"token\" name=\"token\" value=\"(.*?)\">/", $result, $matchArr);
$token = $matchArr[1];
$pwd = hash('sha512', $pass);

/*token=SO3100EIBPDQPULZ2PNO&
redirect=&
mainURL=http%3A%2F%2Fwww.schneidersports.com&
pwd=fe0468680d4f90bf7446e49a3c9100b490a8db06df47588320921a36f0b92703dc7284797bb391a766cbec7c92a9cffa7d1b535c7aa4d345788d0153a93a1ee6&
user_sort=on&
id=shoplink&
pass=a0000&
name=&
orderNo=*/

/*echo "<xmp>";
print_r($pwd);
echo "</xmp>";
exit;*/

/*$md5=md5($p);
var_dump($md5);
echo "<br><br>";*/

/*echo "<b>sha512 hash('sha512',$id.$p)</b><br>";
$sho512 = hash('sha512',$id.$p);*/

$data = array(
	'token' => $token,
	'redirect' => '',
	'mainURL' => 'http://www.schneidersports.com',
	'pwd' => $pwd,
	'user_sort' => 'on',
	'id' => 'shoplink',
	'pass' => $pass,
	'name' => '',
	'orderNo' => ''
);

$string = http_build_query($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.schneidersports.com/member/login_ajaxCheck.asp');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, 'http://www.schneidersports.com/member/loginOK.asp');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

echo '<xmp>';
print_r($result);
echo '</xmp>';
?>
