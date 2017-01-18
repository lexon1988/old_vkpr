<?php
$file=file('counter.txt');

for($i=0;$i<100;$i++)
	{
	

		$pov=0;
	
		for($j=0;$j<100;$j++)
			{
			
			if($file[$i]==$file[$j]) $pov=$pov+1;
			$user=$file[$i];
			
			}

				if($pov>1) 
					{
						include("../config.php");
						mysql_query("

						DELETE FROM tabla
								WHERE uid = '$user'
								
						");
					$pov=0;
					echo $user;
					}
	}



	
?>














