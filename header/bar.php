
<?php
if($_COOKIE["uid"]<>"" && $_COOKIE["access_token"]<>"" && $_COOKIE["photo"]<>"")
{
?>

<div class='main_menu'>
		

		
		<div style='padding-top:20px;  margin:0 auto;  width:1330px;' >
<div class='logos' style="margin-left:4px; margin-top: 2px;"><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/'><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/logo2.png' height= 27px width= 27px;></a></div>
	
		<div id='cssmenu' style="margin-left: 110px;">
		

		
		<ul>
	  
			<li class='active has-sub'><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-emailalt.png' width= 10px; height= 10px;> Рассылка |</a>
			  <ul>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/spam/messages/'> - Рассылка сообщений (ЛС)</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/spam/input/'> - Входящие сообщения (ЛС)</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/spam/wall/'> - Рассылка на стену</a>
			  
			  
			  
			  </ul>

			  
			  
			  <li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-managedhosting.png' width= 10px; height= 10px;> Постинг |</a>
			  <ul>
	     		<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/posting/wallpost/'> - Постинг на стену</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/posting/repost/'> - Репост по списку</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/posting/clubs_post/'> - Постинг в группы "Добавь | Лайк"</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/posting/auto_post/'> - Автопостинг в группы "Добавь | Лайк"</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/posting/status/'> - Сменить статус</a>
			  </ul>
			  
			  
			  
		  
		 <li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-addfriend.png' width= 10px; height= 10px;> Друзья / Подписчики |</a>
			  <ul>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/take/'> - Список безотказников</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/add/'> - Добавить друзей из списка</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/del/'> - Удалить из друзей по списку</a>   
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/approve/'> - Одобрить все заявки в друзья</a>      		
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/added/'> - Новые-> старые друзья</a>   
			  </ul>

			  
			<li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-groups-friends.png' width= 10px; height= 10px;> Сообщества |</a>
			  <ul>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/clubs/add/'> - Пригласить в сообщество</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/clubs/getInvitedUsers/'> - Список приглашённых</a>      
			  
			  </ul>  
			  
			  
			  
			<li><a href='' style='color: white' ><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-heart.png' width= 10px; height= 10px;> Лайки |</a>  
			  <ul>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/likers/avatar/'> - Лайк на аватар</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/likers/post/'> - Лайк на 1-ую запись</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/likers/avatar_count/'> - Кол-во лайков на аватаре</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/likers/post_count/'> - Кол-во лайков на 1-ой записи</a>
			  </ul>
			  
			   <li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-ok.png' width= 15px; height= 15px;> Фото |</a>  
			 <ul>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/photo/photo_tags/' > - Отметить на фото </a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/photo/add_album'> - Создать альбом</a>
				<li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/photo/photo_save/'> - Сохранить фото в альбом</a>
			
			  </ul>
			  
				
			  
			  
   <li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-braces.png' width= 10px; height= 10px;> Парсеры |</a> 
      <ul>
       <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/f_list/'> - Парсер друзей персональной страницы</a>
       <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/c_list/'> - Парсер подписчиков сообщества</a>
	   <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/wallget/'> - Парсер записей на стене</a>
	   <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/photo/'> - Парсер фотографий</a>
	   <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/g_search/'> - Поиск сообществ</a>
	 </ul>
			  
			  
	<li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-shades-sunglasses.png' width= 16px; height= 16px;> Прокси |</a> 
      <ul>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/proxy.php'> - Подключить прокси</a>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/proxydel.php'> - Отключить прокси</a>
      </ul>
  
	
	 <li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-file.png' width= 10px; height= 10px;> Списки |</a> 
      <ul>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/linker/'> - Линкер</a>
       <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/clean/'> - Удалить повторения</a>
   <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/delfrom/'> - Удалить из списка список</a>
      </ul>
	  

  
    <li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-at.png' width= 13px; height= 13px;> Обратная связь |</a> 
      <ul>
        <li><a href='http://vk.com/id300175570'> - По всем вопросам</a>
  
      </ul>
	  
	  
	 <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-firstaid.png' width= 10px; height= 10px;> Помощь |</a>
      <ul>

      </ul>
	  
	  
	      <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/reg_out.php' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-exit.png' width= 13px; height= 13px;> Выход</a>
	  
		 </ul>
		</div>
	</div>
</div>
	
	
<?php
}

else

{
?>


<div class='main_menu'>

		<div style='padding-top:20px; margin:0 auto;  width:1300px;' >
		
<div class='logos' style="margin-left: 1px; margin-top: 2px;"><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/'><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/logo2.png' height= 27px width= 27px;></a></div>
	
		<div id='cssmenu' style="margin-left: 265px; ">
		
			  
		  	<ul>
		 <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/friends/take/' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-addfriend.png' width= 10px; height= 10px;> Список безотказников |</a>
			  <ul>
		
   		

			  </ul>

			  
		
			  
			  

			  
			   
    
			  
			  
   <li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-braces.png' width= 10px; height= 10px;> Парсеры |</a> 
      <ul>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/f_list/'> - Парсер личной страницы</a>
       <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/parsers/c_list/'> - Парсер сообщества</a>

      </ul>
			  
			  
	<li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-shades-sunglasses.png' width= 16px; height= 16px;> Прокси |</a> 
      <ul>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/proxy.php'> - Подключить прокси</a>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/proxydel.php'> - Отключить прокси</a>
      </ul>
  
	
	 <li><a href='' style='color: white'  ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-file.png' width= 10px; height= 10px;> Списки |</a> 
      <ul>
        <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/linker/'> - Линкер</a>
       <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/clean/'> - Удалить повторения</a>
	   <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/tools/lists/delfrom/'> - Удалить из списка список</a>
      </ul>
	  

  
    <li><a href='' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-at.png' width= 13px; height= 13px;> Обратная связь |</a> 
      <ul>
        <li><a href='http://vk.com/id300175570'> - По всем вопросам</a>
  
      </ul>
	  
	  
	  <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-firstaid.png' width= 10px; height= 10px;> Помощь |</a>
      <ul>

      </ul>
	  
	  
	      <li><a href='http://<?php echo $_SERVER['SERVER_NAME'];?>/reg.php' style='color: white' ><img src='http://<?php echo $_SERVER['SERVER_NAME'];?>/img/icon-key.png' width= 13px; height= 13px;> Авторизация</a>
	  
	 </ul>
		

		
		</div>
	</div>
</div>	
<?php
}

?>
