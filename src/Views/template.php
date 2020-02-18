<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="..\static\css\style.css">
</head>
<body>
	<header class="main-style size-80 flex beetween alcntr">
		<div class="flex1">
            <div class="margin link"> 
				<a href="/">Главная</a>
			</div>	
			<? if(isset($_SESSION['login'])): ?>
			<div class="margin link"> 	
				<a href="/my">Личный кабинет</a>
			</div>
			<? endif; ?>

		</div>

<!-- ============================================= -->

		<? if(isset($_SESSION['login'])): ?>
			<img src="img/rty.jpg" alt="img">
			<form action="/logout" method="GET">
				<input type="submit" value="Выйти">
			</form>

		<? else: ?>	
			<form name="authorization">
				<div>
					<label for="login">Введите логин<input type="text" id="login" name="login"></label>
				
				
				</div>

				<div>	
					<label for="psw">Введите пароль<input type="password" id="psw" name="pwd"></label>
				
				</div>
				<input type="submit" value="Войти">
				<button><a href="/reg">Зарегистрироваться</a></button>
			</form>

		<? endif; ?>

<!-- ============================================ -->
		
	</header>

	<!-- ================================= -->
	 
            <? if(isset($_SESSION['login'])): ?>
                    			

		<? include_once '../src/Views/account/trackform.php'; ?>

			</div>
			
			
			
        	<? endif; ?>
    <!-- ========================================= -->

	<? include_once $content; ?>

	<footer class="main-style size-80">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</footer>
	
	<script src="/static/js/authorization.js"></script>
</body>
</html>