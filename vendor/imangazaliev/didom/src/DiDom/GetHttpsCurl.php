<?php

namespace DiDom;
/**
* GetHttpsCurl
*/
class GetHttpsCurl {

  public static function to($url, Array $data = [])
  { 

    $ip = long2ip(rand(2130706433,21307064330));
    $header = array('CLIENT-IP:'.$ip,'X-FORWARDED-FOR:'.$ip,
        // 'Connection: keep-alive',
        // 'Cache-Control: max-age=0',
        // 'Upgrade-Insecure-Requests: 1',
        // 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
        // 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        // 'Accept-Encoding: gzip, deflate',
        // 'Accept-Language: zh,zh-CN;q=0.9,en;q=0.8',
        // 'Cookie: gsScrollPos-804=0; PHPSESSID=pfssl1opno4u010847vic85aj6; Hm_lvt_7b35f293bc11ee39082fa12ba454d185=1522317639; safedog-flow-item=; sqlmap=a%3A0%3A%7B%7D; orderbyStr=id+desc; citymsg=370100-jn-%E6%B5%8E%E5%8D%97; firstRow=35; Hm_lpvt_7b35f293bc11ee39082fa12ba454d185=1522381431',
    );
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // 检查 common name（域名）
    curl_setopt($ch, CURLOPT_TIMEOUT,60);   
    // curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE); 
    // curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:1080");
    // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
    //curl_setopt($ch, CURLOPT_ENCODING ,''); //加入gzip解析
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
    //  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1');
    $response = curl_exec($ch);
    $error = curl_error($ch);   
    if( $type = mb_detect_encoding($response,"GBK,UTF-8") != 'UTF-8' ){
      $response = mb_convert_encoding($response, "utf-8", "GBK");
    }
 

    // 关闭cURL资源，并且释放系统资源
    curl_close($ch);
    return $response;
  }
}