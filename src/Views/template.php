<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="..\static\css\style.css">
</head>
<body>
	<header class="main-style size-80 flex beetween alcntr">
		<div class="flex">
			<a href="/">Главная</a>
		</div>


		<form action="#" method="POST">
			<div>
				<label for="login">Введите логин<input type="text" id="login"></label>
				
				
			</div>

			<div>	
				<label for="psw">Введите пароль<input type="password" id="psw"></label>
				
			</div>
			<input type="submit" value="Войти">
			<button><a href="/reg">Зарегистрироваться</a></button>
		</form>
		
	</header>
	<!-- <? include_once $loading; ?> -->

	<? include_once $content; ?>

	<footer class="main-style size-80">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</footer>
	
</body>
</html>