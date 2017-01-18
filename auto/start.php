<h1>Автопостинг</h1>

<br>
<form method="post" action="start2.php">
<font size=2 color='red'>Первые 5-10 групп, могут потребовать капчу, всё зависит от активности и времени суток, лучше постить не с самой первой группы.</font>
<br><br>
В базе <?php echo $max=sizeof(file ('../list.txt')); ?> групп, начать постинг с  
<input type="text" name="min" value="10" size="3">- <input type="text" name="max" value="<?php echo $max; ?>" size="3"><br><br>
Постить с интервалом <input type="text" name="time" value="15" size="3"> сек.<br><br>

Автоматически добовлять друзей: Да <label><input type="radio" name="radio"" value="true" > </label> || Нет <label><input type="radio" name="radio" value="false" checked> </label><br><br>



<input type="submit" name="go" value="Отправить">

</form>
