<?php
//echo sin(deg2rad(30));
//echo sin(M_PI);

date_default_timezone_set("Asia/Shanghai");
$offsetX = 249;
$offsetY = 249;
$bgr = 120;
$bgCircle = array();

for($i = 0; $i < 360; $i+=1) {
    $x = round(cos($i * M_PI / 180) * $bgr);
    $y = round(sin($i * M_PI / 180) * $bgr);
    $bgCircle[] = array('x' => $x + $offsetX, 'y' => $y + $offsetY);
}

$offsetX = 248;
$offsetY = 248;
$mr = 110;
$secTemp= array();
for($i = 0; $i < 360; $i+=6) {
	$x = round(cos($i * M_PI / 180) * $mr);
    $y = round(sin($i * M_PI / 180) * $mr);
    $secTemp[] = array('x' => $x + $offsetX, 'y' => $y + $offsetY);
}

$secCircle = array();
$k=0;
for($i=29;$i>=0;$i--){
	$secCircle[$k] = $secTemp[$i];
	$k++;
}
for($i=59;$i>=30;$i--){
	$secCircle[$k] = $secTemp[$i];
	$k++;
}

$timer = array('hour'=>date("H"), 'min'=>date("i"), 'sec'=>date("s"));

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Funny Clock</title>
<link rel="stylesheet" type="text/css" href="static/css/styles.css" />
<link rel="stylesheet" type="text/css" href="static/css/clock.css" />
<script type="text/javascript" src="static/js/jquery.min.js"></script>
<script type="text/javascript" src="static/js/clock.js"></script>
<script>
var max_sec = 59;
var last_sec = <?php echo $timer['sec'];?>;
var hour = <?php echo $timer['hour'];?>;
var min = <?php echo $timer['min'];?>;
$(function(){
	setTimes(hour, 'h');
	setTimes(min, 'm');
	setInterval("goClock()", 1000);
});
</script>
</head>
<body>
<div class="main">

<div class="bg">
<?php 
foreach($bgCircle as $k=>$bgc){ 
$style = "top:" . $bgc['x'] . "px;left:" . $bgc['y'] . "px;";
?>
<b style="<?php echo $style;?>"></b>
<?php } ?>
</div><!--/bg-->

<div class="sec">
<?php 
foreach($secCircle as $k=>$sc){ 
$style = "top:" . $sc['x'] . "px;left:" . $sc['y'] . "px;";
$class = "sec".$k;
if($k<$timer['sec'] && !in_array($k,array(14,29,44,59))){
	$class .= " on";
}
?>
<b class="<?php echo $class;?>" style="<?php echo $style;?>"></b>
<?php } ?>
</div><!--/sec-->

<div class="hour t">00</div>
<div class="min t">00</div>

<div class="cent point1"></div>
<div class="cent point2"></div>

<div class="hints">
<h1>Funny Clock</h1>
<p>Only CSS and Javascript, No Images.</p>
</div>

</div><!--/main-->

</body>
</html>