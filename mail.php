<?php
// create a new cURL resource
$ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, "http://reg.163.com/logins.jsp");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result=curl_exec($ch);
// echo $result+"<br>";
// $result=substr($result,strpos($result, "syscheckcode")+20);
// $syscheckcode=substr($result,0,strpos($result,"\""));
// echo $syscheckcode;
//set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://reg.163.com/logins.jsp?url=&product=&savelogin=&outfoxer=&domains=&syscheckcode=157ed6b267cacf896117deef36e1ed4907f430a4&username=wynet321@163.com&password=048321&Submit=");
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,"Content-type: text/html; charset=utf-8");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//grab URL and pass it to the browser
//$result=iconv( "GBK", "gb2312" , curl_exec($ch));
$result=curl_exec($ch);
//close cURL resource, and free up system resources
curl_close($ch);
//echo $result;
if(false==$result)
{
	echo "服务暂停，请稍候再试...";
}
else
{
	echo "<a href='#' onclick='window.open(\"http://entry.mail.163.com/coremail/fcg/ntesdoor2?verifycookie=1&amp;lightweight=1&amp;from=urs\",\"new\");'>163邮箱</a>";
}
?>