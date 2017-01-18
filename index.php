<?php
$home= $_SERVER['SERVER_NAME']
?>
<html>
	<head>
		<?php include('header/title.php'); ?>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="http://<?php echo $home;?>/style.css"> 
	

	
	
	
	</head>
	
		<body>

			

				<div class='main_div' >

				
				<table height=110%>
				
				<tr>
					<td colspan="3" >
					<?php include('header/bar.php'); ?>		
					<div><font class='font11111'>.</font></div>
					<td>
				</tr>

				
					
				
				
					<td height=100%><iframe src="http://<?php echo $home;?>/header/piar.php" class='iframe_piar' ></iframe></td>
					<td height=100%><iframe src="manual/main.php" class='iframe_main'></iframe></td>
					<td height=100%><iframe src="http://<?php echo $home;?>/header/news.php" class='iframe_piar2' ></iframe></td>
					<td height=100%></td>
					
				
				</tr>
				
				<tr>
					<td colspan="3" >
					
					<?php include('header/footer.php'); ?>
					<td>
				</tr>
				</table>
	
					
					

		
		</body>
</html>
