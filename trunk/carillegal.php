<?php
    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "http://sslk.bjjtgl.gov.cn/jgjww/wzcx/wzcx_result.jsp?sf=11&&hpzl=02&&hphm=NWU810&&fdjh=6010970");
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,"Content-type: text/html; charset=UTF-8");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_WRITEFUNCTION, "checkready");

    // grab URL and pass it to the browser
    $result=iconv( "GBK", "UTF-8" , curl_exec($ch));
    
    // close cURL resource, and free up system resources
    curl_close($ch);
    if(false==$result)
    {
    	echo "服务暂停，请稍候再试...";//$doc->loadHTML($result);
    }
    elseif(false==strpos($result,"您没有未接受处理",0))
        echo "<a href='#' onclick='window.open(\"http://sslk.bjjtgl.gov.cn/jgjww/wzcx/wzcx_result.jsp?sf=11&&hpzl=02&&hphm=NWU810&&fdjh=6010970\",\"new1\");'>倒霉！快去处理下...</a>";
    else
        echo "<a href='#' onclick='window.open(\"http://sslk.bjjtgl.gov.cn/jgjww/wzcx/wzcx_result.jsp?sf=11&&hpzl=02&&hphm=NWU810&&fdjh=6010970\",\"new1\");'>这次又让你小子逃了!</a>";

?>