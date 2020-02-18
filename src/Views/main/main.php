
	<div class="container">
		<div class="h1">
			<h1>My music site</h1>
		</div>



			<div class="block">
				<p class="head"><strong>Музыка наших конкурсантов</strong>
				</p>							
			</div>

	<div class="main flex">

		<div class="range main-style border">Рейтинг
			   <!-- <? var_dump($rate); ?>  -->
			<ol>
				<? foreach($rate as $get): ?>
					<li><? echo $get['name'] . ' : ' . $get['rate']; ?></li>
				<? endforeach; ?>

			</ol>
		</div>
			
		<div class="size-80 flex1 main-style border"> <!-- Этот блок является динамическим и наполняется вложенными в него контентом -->

			<? foreach($track as $get): ?>
				<div class="block image border">	
					<a class="lcolor" href="<? echo $get['link']; ?>" type="audio/mp3"><? echo $get['name']; ?>
					</a>
					<? if(isset($_SESSION['login'])): ?>
					<form action="/vote" method="post" name="voice">
						<fieldset>
							<legend>Голосуй</legend>
							<label for="mark_1">1<input id="mark_1" type="radio" name="vote" value="1"></label>
							<label for="mark_2">2<input id="mark_2" type="radio" name="vote" value="2"></label>
							<label for="mark_3">3<input id="mark_3" type="radio" name="vote" value="3"></label>
							<label for="mark_4">4<input id="mark_4" type="radio" name="vote"
								value="4"></label>
							<label for="mark_5">5<input id="mark_5" type="radio" name="vote" value="5"></label>
							<input type="submit" value="Голос">
							<input type="hidden" value="<? echo $get['id_track']; ?>" name="id">
						</fieldset>
					</form>	
					<? endif; ?>
				</div>
			<? endforeach; ?>		
				
												
			</div>				

	</div>

	</div>