<div class="container data-container">

		<form action="/reg" method="POST" class="data-form" enctype="multipart/form-data">

		<div class="row2">
			<div class="data-label">
				login
			</div>
			<div>
				<input name="login" type="text">
			</div>
		</div>
		<div class="row2">
		<div class="data-label">Ваш email</div>
			<div>
				<input name="email" type="email">
			</div>
		</div>
		<div class="row2">
			<div class="data-label">Введите пароль
			</div>
			<div>
				<input name="pwd" type="password">
			</div>
		</div>
		<div class="row2">
			<div class="data-label">Подтвердите пароль</div>
			<div><input name="pwd_2" type="password"></div>
		</div>
		<div class="button">
				<input type="submit" value="Сохранить">
		</div>	
		<div class="row2">
			<div class="data-label">Загрузите картинку
			</div>
			<div>
				<input name="avatar" type="file">
			</div>
		</div>	
		

		<?
			if ($_SESSION['psw_error']) {
				echo '<p class="msg">' . $_SESSION['psw_error'] . '</p>';
				 
			}
			unset($_SESSION['psw_error']);
			
		?>


	
		</form>


 	</div>
