<?php
echo "<xmp>";
print_r($_COOKIE);
echo "</xmp>";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://www.interpark.com/member/login.do?_method=initial&GNBLogin=Y&mbn=gnb_sp&mln=login&sid1=common&sid2=login&sid3=001&sid4=001&bl_id=M92010&historyGoCnt=-1');
// curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0)");
curl_setopt($ch, CURLOPT_COOKIEJAR, '/home/pcy/www/html/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, '/home/pcy/www/html/tmp/cookies.txt');
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
// $data = '&sc.memId='.$id.'&sc.pwd='.$pass.'&sc.enterEntr=Y&isAjax=Y&checkCaptchaText=@IPSS@&sc.saveMemId=&imfsUserPath=null&imfsUserQuery=null&logintgt=&isPopup=&GNBLogin=null&isToy=';
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$result = curl_exec($ch);


echo "쿠키 예제";
echo "<xmp>";
print_r($_COOKIE);
echo "</xmp>";



?>
