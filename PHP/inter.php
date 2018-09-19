<?
    
    $cookie_nm = "/cookie.txt";
    
    $ch = curl_init();


    $postData = "&sc.memId=sungye&sc.pwd=nemo0701&sc.enterEntr=Y&isAjax=Y&checkCaptchaText=@IPSS@&sc.saveMemId=&imfsUserPath=null&imfsUserQuery=null&logintgt=&isPopup=&GNBLogin=Y&isToy=";
    $loginUrl = "https://ipss.interpark.com/member/login.do?_method=login";
    
    unset($header);
    $header[] = "Accept: */*";
    $header[] = "Accept-Language: ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7";
    $header[] = "Accept-Encoding: gzip, deflate, br";
    $header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36";
    $header[] = "Content-Length: ".strlen($postData);
    $header[] = "Content-Type: application/x-www-form-urlencoded";
    $header[] = "api-key: 4c865b289eb81f75a8adce1f0eca76cf";
    $header[] = "Referer: https://ipss.interpark.com/member/login.do";
    $header[] = "Origin: https://ipss.interpark.com";
    $header[] = "Connection: keep-alive";
    $header[] = "Host: ipss.interpark.com";

    curl_setopt($ch, CURLOPT_URL, $loginUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch ,CURLOPT_POSTFIELDS,$postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_nm);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_nm);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $content = curl_exec($ch);
    
    $postData = "_method=loginCase&ipssUserPath=%2Fipss%2Fipssmainscr.do&ipssUserQuery=_method%3Dinitial%26_style%3DipssPro%26wid1%3Dwgnb%26wid2%3Dwel_login%26wid3%3Dseller&sc.useAppTp=02&sc.isIpss=E&sc.enterEntr=Y&checkCaptchaText=&ipssYn=Y&sc.memId=sungye&sc.pwd=nemo0701&oCheckCaptcha=&ordNm=&hp=&ordPw=";

    $loginUrl = "https://ipss.interpark.com/member/login.do";
    
    unset($header);
    $header[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
    $header[] = "Accept-Language: ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7";
    $header[] = "Accept-Encoding: gzip, deflate, br";
    $header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36";
    $header[] = "Content-Length: ".strlen($postData);
    $header[] = "Content-Type: application/x-www-form-urlencoded";
    $header[] = "api-key: 4c865b289eb81f75a8adce1f0eca76cf";
    $header[] = "Referer: https://ipss.interpark.com/member/login.do";
    $header[] = "Origin: https://ipss.interpark.com";
    $header[] = "Connection: keep-alive";
    $header[] = "Host: ipss.interpark.com";

    curl_setopt($ch, CURLOPT_URL, $loginUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch ,CURLOPT_POSTFIELDS,$postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_nm);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_nm);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $content = curl_exec($ch);
    
    $postData = "_method=loginEntr&_style=imfs&sc.page=1&sc.loginTgt=null&logintgt=null&entrNm=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrNo=3002759624&supplyCtrtSeq=2&supplyCtrtNm=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp=02&memNo=3002759624&type=update&reqSite=null&imfsUserPath=&imfsUserQuery=&historyGoCnt=null&authTp=01&iciDelvYn=N&sc.saveMemId=null&sc.memId=sungye&sc.pwd=509C5CD99E68A3CF3B23000D6547ADD8F3D88D71A149425D3E201627F39D375D&memNo_0=3002759624&entrNo_0=3002759624&supplyCtrtSeq_0=1&entrNm_0=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_0=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_0=02&authTp_0=01&iciDelvYn_0=N&entrNoSupCtSeq_0=30027596241&memNo_1=3002759624&entrNo_1=3002759624&supplyCtrtSeq_1=2&entrNm_1=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_1=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_1=02&authTp_1=01&iciDelvYn_1=N&entrNoSupCtSeq_1=30027596242&memNo_2=3002759624&entrNo_2=3002759624&supplyCtrtSeq_2=4&entrNm_2=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_2=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_2=02&authTp_2=01&iciDelvYn_2=N&entrNoSupCtSeq_2=30027596244&memNo_3=3002759624&entrNo_3=3002759624&supplyCtrtSeq_3=5&entrNm_3=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_3=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_3=02&authTp_3=01&iciDelvYn_3=N&entrNoSupCtSeq_3=30027596245&memNo_4=3002759624&entrNo_4=3002759624&supplyCtrtSeq_4=6&entrNm_4=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_4=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_4=02&authTp_4=01&iciDelvYn_4=N&entrNoSupCtSeq_4=30027596246&memNo_5=3002759624&entrNo_5=3002759624&supplyCtrtSeq_5=9&entrNm_5=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_5=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_5=02&authTp_5=01&iciDelvYn_5=N&entrNoSupCtSeq_5=30027596249&memNo_6=3002759624&entrNo_6=3002759624&supplyCtrtSeq_6=7&entrNm_6=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&supplyCtrtNm_6=%B3%D7%B8%F0%C4%BF%B8%D3%BD%BA%28%C1%D6%29&entrTp_6=02&authTp_6=02&iciDelvYn_6=N&entrNoSupCtSeq_6=30027596247&ipssUserQuery=_method%3Dinitial%26_style%3DipssPro%26wid1%3Dwgnb%26wid2%3Dwel_login%26wid3%3Dseller&sc.memId=sungye&sc.useAppTp=02&sc.pwd=nemo0701&ipssUserPath=%2Fipss%2Fipssmainscr.do&ordPw=&sc.enterEntr=Y&ordNm=&sc.isIpss=E&checkCaptchaText=&oCheckCaptcha=&ipssYn=Y&hp=";

    $loginUrl = "https://ipss.interpark.com/member/login.do";
    
    unset($header);
    $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
    $header[] = 'Accept-Encoding: gzip, deflate, br';
    $header[] = 'Accept-Language: ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7';
    $header[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';
    
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_URL, $loginUrl);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_nm);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_nm);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $content = curl_exec($ch);

    unset($header);
    $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
    $header[] = 'Accept-Encoding: gzip, deflate';
    $header[] = 'Accept-Language: ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7';
    $header[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';
    $header[] = 'Host: ipss.interpark.com';

    $loginUrl="http://ipss.interpark.com/ipss/ipssmainscr.do?_method=initial&_style=ipssPro&wid1=wgnb&wid2=wel_login&wid3=seller";
    curl_setopt($ch, CURLOPT_URL, $loginUrl);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_nm);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_nm);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $content = curl_exec($ch);

    
    echo "<xmp>";
    print_r($content);
    echo "</xmp>";
    exit;


?>
