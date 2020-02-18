			<div class="list">

				<h4>Загрузите файл или несколько файлов</h4>

				<div class="form">
					<form action="/trackload" method="POST" enctype="multipart/form-data">
						<div>
							<input name="track" type="file" accept="audio/*"  required>
						</div>
						<div>
							<input name="name" type="text" value="Название" required>
						</div>

						<div class="submit">
							<input type="submit" value="Отправить файл">
						</div>
					</form>
				</div>

			</div>
			