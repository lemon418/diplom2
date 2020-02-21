<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1/0">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="..\static\css\style.css">
	<link rel="stylesheet" href="..\static\css\player.css">
</head>
<body>
	<header class="main-style size-80 flex1 alcntr">
		<div class="flex1 txtcenter part1">
			<div class="margin link flex alcntr around"> 
           		 <a href="/">           		
						Главная						
				</a>
			</div>
			<? if(isset($_SESSION['login'])): ?>
			<div class="margin link flex around"> 	
				<a href="/my">Личный кабинет</a>
			</div>
			<? endif; ?>

		</div>

<!-- ============================================= -->
		<? if(isset($_SESSION['login'])): ?>

		<div class="flex alcntr part1 end">
			<div>
				<img src="img/rty.jpg" alt="" class="block">
			</div>
			<div>
				<form action="/logout" method="GET" class="block">
				<input type="submit" value="Выйти" class="logout">
				</form>
			</div>
		</div>
		<? else: ?>	

		<div class="part1">
			<form name="authorization">
				<div class="flex1">
					<div class="part1 flex end">	<label for="login">Введите логин</label></div>
					<div class="part1">	<input type="text" id="login" name="login"></div>
				
				
				</div>

				<div class="flex padding">	
					<div class="part1 flex end"><label for="psw">Введите пароль</label></div>
					<div class="part1"><input type="password" id="psw" name="pwd"></div>
				
				</div>
				<div  class="flex padding">
					<div class="part2"></div>
					<div class="part1"><input class="button" type="submit" value="Войти"></div>
				</div>
				<div  class="flex padding">
					<div class="part2"></div>
					<div class="part1"><button class="button"><a href="/reg">Регистрация</a></button>
					</div>
				</div>
			</form>
		</div>	

		<? endif; ?>

<!-- ============================================ -->
		
	</header>

	<!-- ================================= -->
	 
            <? if(isset($_SESSION['login'])): ?>
                    			
		<? include_once '../src/Views/account/trackform.php'; ?>

			</div>		
			
        	<? endif; ?>
    <!-- ========================================= -->
    <? include_once '../src/Views/account/sound.php'; ?>

	<? include_once $content; ?>

	<footer class="main-style size-80 txtcenter">
<span class="range">Записаться на курсы создания электронной музыки Вы можете:
<ul> 
	<li>по телефону: +7 (950) 555 63 90.</li>
	<li>напсать нам на email: musicmaker@spb.ru.</li>
</ul>
</span>

	</footer>
	
	<script src="/static/js/authorization.js"></script>
	<script src="/static/js/sound.js"></script>
</body>
</html>