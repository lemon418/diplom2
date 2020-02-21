<div class="container head">
	<h2>Моя музыка</h2>
				<!-- <? var_dump($mytracks); ?>		 -->
		<ol>
			<? foreach ($mytracks as $track): ?>
			<form action="/delete" method="POST">
				<li><? echo  $track['name']; ?> </li>
				<input type="hidden" value="<? echo $track['id_track']; ?>" name="id">
				<input type="submit" value="удалить"  class="vote">
			</form>	
			<br>	
			<? endforeach; ?> 
		</ol>
</div>