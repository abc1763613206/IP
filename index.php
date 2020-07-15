<?php $counter = intval(file_get_contents("counter.dat")); ?>
<?php include 'function.php';?>
<?php
header("Content-type: image/JPEG");
//判断mode使用不同图片
$mode = $_GET["mode"];
$pic = $_GET["pic"];
switch($mode)
{
  case "1":$im = imagecreatefromjpeg("xhxh.jpg");break;
  case "2":if($pic=="Chtholly"){$im = imagecreatefromjpeg("qmd_Chtholly.jpg");}else if($pic=="Pipi"){$im = imagecreatefromjpeg("qmd_pipi.jpg");}else {$im = imagecreatefromjpeg("qmd.jpg");}break;
  default:$im = imagecreatefromjpeg("xhxh.jpg");break;
}
$ip = $_SERVER["REMOTE_ADDR"];
$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组
$get=$_GET["s"];
$get=base64_decode(str_replace(" ","+",$get));
//$wangzhi=$_SERVER['HTTP_REFERER'];这里获取当前网址
//here is ip 

// taobao api
$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip; 

// ip-api
// $url="http://ip-api.com/json/".$ip."?lang=zh-CN";

$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';  
$curl = curl_init(); 
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_HEADER, 0);  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  
curl_setopt($curl, CURLOPT_ENCODING, '');  
curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);  
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);  
$data = curl_exec($curl);
$data = json_decode($data, true);
// taobao api
$country = $data['data']['country']; 
$region = $data['data']['region']; 
$city = $data['data']['city'];

// ip-api
// $country = $data['country'];
// $region = $data['regionName'];
// $city = $data['city'];

//定义颜色
$black = ImageColorAllocate($im, 0,0,0);//定义黑色的值
$red = ImageColorAllocate($im, 255,0,0);//红色
$blue = ImageColorAllocate($im, 0,0,255);
$font = 'msyh.ttf';//加载字体
//输出
imagettftext($im, 16, 0, 10, 40, $red, $font,'欢迎您来自'.$country.'-'.$region.'-'.$city.'的朋友');
imagettftext($im, 16, 0, 10, 72, $red, $font, '今天是'.date('Y年n月j日')."  星期".$weekarray[date("w")]);//当前时间添加到图片
imagettftext($im, 16, 0, 10, 104, $red, $font,'您的IP是:'.$ip);//ip
imagettftext($im, 16, 0, 10, 140, $red, $font,'您使用的是'.$os.'操作系统');
imagettftext($im, 16, 0, 10, 175, $red, $font,'您使用的是'.$bro.'浏览器');
imagettftext($im, 14, 0, 10, 200, $black, $font,$get); 
imagettftext($im, 15, 0, 10, 200, $red, $font,'这个签名档一共被使用了'.$counter.'次'); 
if($mode == "2"){   //新模式
  $lg = $_GET["lg"]; //获取参数
  $gh = $_GET["gh"];
  $qq = $_GET["qq"];
  $mail = $_GET["mail"];
  $stren = $_GET["str"];
  $strsize = $_GET["strsize"];
  if($strsize == NULL) {
    $strsize = 18;
  }
  //$strde = base64_decode($stren); //base64存放
  imagettftext($im, 20, 0, 595, 34, $black, $font,''.$lg.'');
  imagettftext($im, 20, 0, 595, 75, $black, $font,''.$gh.'');
  imagettftext($im, 20, 0, 595, 120, $black, $font,''.$qq.'');
  imagettftext($im, 20, 0, 595, 163, $black, $font,''.$mail.'');
  imagettftext($im, $strsize, 0, 545, 197, $blue, $font,''.$stren.''); 
}
ImageGif($im);
ImageDestroy($im);
?>
<?php
    $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");
     //$fpip = fopen("IP.dat","w");
     fwrite($fp, $counter);  
     //fwrite($fpip, $ipold+' '+$ip);
     fclose($fp); 
     //fclose($fpip);


 ?>
