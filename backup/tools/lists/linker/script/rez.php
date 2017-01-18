<html>

<head>
<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/style2.css"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />




</head>

	<body>
	
	<div class='main'>
	

	<br>
	<b><font>Линкер</font></b>
	<hr>
	<div style='margin-left:250px;'>
<?php
$text= $_POST['text'];

$lines = preg_split('/\r?\n/', $text);
$max=count($lines);

if($_POST['dzen']==1)
	{ 		

	for($i=0;$i<$max;$i++)
		{
			echo "<a href='http://vk.com/id".$lines[$i]."' target='_blank'>http://vk.com/id".$lines[$i]."</a><br>";

		}

		
	}

		else
		
		{
		
				for($i=0;$i<$max;$i++)
				{
					echo "<a href='http://vk.com/club".$lines[$i]."'>http://vk.com/club".$lines[$i]."</a><br>";

				}

		
		
		}
		
?>
	</div>


<br><br>



</div>

</body>

</html>
