<?php


$hidemyass= file_get_contents('http://proxylist.hidemyass.com/search-1311077#listable');

$fp = fopen("hidemyass.txt", "w"); // ��������� ���� � ������ ������
$mytext = $hidemyass; // �������� ������
$test = fwrite($fp, $mytext); // ������ � ����
if ($test) echo 'OK';
else echo 'NO(((';
fclose($fp); //�������� �����



?>





