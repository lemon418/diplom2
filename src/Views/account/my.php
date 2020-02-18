<div class="container head">
	<h2>Моя музыка</h2>

		<ol>
			<? foreach ($mytracks as $track): ?>
				<li><? echo  $track['name']; ?> <br><a href="/my?del=<?= $track['id_track'] ?>">удалить</a></li><br>
			<? endforeach; ?> 
		</ol>
</div>