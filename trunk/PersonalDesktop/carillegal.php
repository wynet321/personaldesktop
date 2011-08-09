<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://sslk.bjjtgl.gov.cn/jgjww/wzcx/wzcx_result.jsp?sf=11&&hpzl=02&&hphm=NWU810&&fdjh=6010970");
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,"Content-type: text/html; charset=UTF-8");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser
$result=iconv( "GBK", "UTF-8" , curl_exec($ch));
//echo $result;
//$doc=new DOMDocument();
if(false!=$result)
{
	//$doc->loadHTML($result);
}
else
//$doc="";
$result="";

// close cURL resource, and free up system resources
curl_close($ch);
if(false==strpos($result,"您没有未接受处理",0))
	echo "<div id='carillegal'>这次又让你小子逃了!</div>";
else
	echo "<div id='carillegal'><a href='http://sslk.bjjtgl.gov.cn/jgjww/wzcx/wzcx_result.jsp?sf=11&&hpzl=02&&hphm=NWU810&&fdjh=6010970'>倒霉！快去处理下...</a></div>";
?> 
