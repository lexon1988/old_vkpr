<?php
set_time_limit(0);


for($i=1; $i<10000;$i++) {

$count_file=file('count.txt');
$count=(int)($count_file[0]);

$api='https://api.vk.com/method/friends.get?user_id='.(int)($count);
$fget=file_get_contents($api);



		$fcount=substr_count($fget,','); // 2
		$count_plus=$count+1;

		$fp = fopen("count.txt", "w"); // ��������� ���� � ������ ������
		$mytext = $count_plus; // �������� ������
		$test = fwrite($fp, $mytext); // ������ � ����
		if ($test) echo '';
		else echo '';
		fclose($fp); //�������� �����

						if($fcount>1000) 
								{
									$fp = fopen("rez.txt", "a"); // ��������� ���� � ������ ������
									$mytext = $count."\r\n"; // �������� ������
									$test = fwrite($fp, $mytext); // ������ � ����
									if ($test) echo '';
									else echo '';
									fclose($fp); //�������� �����
								}

						}


?>