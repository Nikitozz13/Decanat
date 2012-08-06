<h2> Добавление нового студента </h2>

<form action = "action" method = "post" id = "form1">
	<label>Фамилия:<br><input type = "text" name = "lastname"></label>

	<p>Специальность:</p>
	<select name = "spec">
		<option>МОиАИС</option>
		<option>Информационная безопасность</option>
		<option>Бизнес-информатика</option>
		<option>Проф. обучение</option>
	</select>

	<br><br><p>Форма обучения:</p>
	<label><input type = "radio" name = "eduform" value = "Очная">Очная</label>
	<label><input type = "radio" name = "eduform" value = "Заочная">Заочная</label>

	<br><br><input type = "reset" name = "reset1" value = "Очистить">
	<input type = "submit" name = "submit1" value = "Подтвердить">
 
</form>