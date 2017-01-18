<?php header( "Refresh: 1; url=add_fin3.php" ); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>Третий этап авторизации</title>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style3.css"> 
</head>

<body>
<div style="margin-top:20px; margin-left:20px;">
<font>Идёт третий этап авторизации, подождите ещё чуть- чуть!</font>
<br>
<?php $rand= rand(60,100); ?>
<br>
<progress value="<?php echo $rand; ?>" max="100"></progress>
</div>
<?php
include('header/loading.php');
?>
</body>

</html>

