			<div class="list">

				<h4>Загрузите файл</h4>

				<div class="form">
					<form action="/trackload" method="POST" enctype="multipart/form-data">
						<div class="margin2 submit">
							<input name="track" type="file" accept="audio/*"  required>
						</div>
						<div class="margin2">
							<input name="name" type="text" placeholder="Название"  required>
						</div>

						<div class="margin2">
							<input type="submit" value="Отправить файл"  class="submit" >
						</div>
					</form>
				</div>

			</div>
			