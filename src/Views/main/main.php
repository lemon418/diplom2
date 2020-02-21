
	<div class="container">
		<div class="h1">
			<h1>Just music site</h1>
		</div>



			<div class="block">
				<p class="head"><strong>Наша музыка</strong>
				</p>							
			</div>

	<div class="main flex">

		<aside class="range main-style border"><div class="rate">Рейтинг</div>
			   <!-- <? var_dump($rate); ?>  -->
			<ol>
				<? foreach($rate as $get): ?>
					<li><? echo '<span class="trname">' . $get['name'] . '</span>' . ' : ' . '<span class="sum">' . $get['rate'] . ' ' . '</span>'; ?></li>
				<? endforeach; ?>

			</ol>
		</aside>
			
		<div class="size-80 flex1 around main-style border"> <!-- Этот блок является динамическим и наполняется вложенными в него контентом -->

			<? foreach($track as $get): ?>
				<div class="flex around musbox">
				<div class="block image border main-style relative">

					<a class="lcolor" href="<? echo $get['link']; ?>" target="play" media="">
						<? echo '<span class="before">' . $get['name'] . '</span>' ?>	
					</a>
					

					<? if(isset($_SESSION['login'])): ?>
					<form action="/vote" method="post" name="voice" class="absolute">
						<fieldset class="voteform">
							<legend>Голосуй</legend>
							<label for="mark_1">1<input id="mark_1" type="radio" name="vote" value="1"></label>
							<label for="mark_2">2<input id="mark_2" type="radio" name="vote" value="2"></label>
							<label for="mark_3">3<input id="mark_3" type="radio" name="vote" value="3"></label>
							<label for="mark_4">4<input id="mark_4" type="radio" name="vote"
								value="4"></label>
							<label for="mark_5">5<input id="mark_5" type="radio" name="vote" value="5"></label>
							<input type="submit" value="Голос" class="vote">
							<input type="hidden" value="<? echo $get['id_track']; ?>" name="id">
						</fieldset>
					</form>	
					<? endif; ?>
				</div>
				</div>
			<? endforeach; ?>		
				
												
			</div>				

	</div>

	</div>