<h2>Добавление нового секретаря</h2>

<?echo $this->Form->create('User');?>
<fieldset>
	<legend>Данные для авторизации</legend>
<?
echo $this->Form->input('User.username', array('label' => 'Ваш логин:'));
echo $this->Form->input('User.password', array('label' => 'Ваш пароль:'));
?>
</fieldset>

<fieldset>
    <legend>Личные данные</legend>
<?
echo $this->Form->input('Person.last_name', array('label' => 'Фамилия:'));
echo $this->Form->input('Person.first_name', array('label' => 'Имя:'));
echo $this->Form->input('Person.birthday', array('label' => 'Днеь рождения:', 'type' => 'date', 'empty' => array('null'=>'Выберите значение')));
echo $this->Form->input('Person.sex',
	array(
		'label' => 'Пол:', 
		'empty' => array('null'=>'Выберите значение'),
		'options' => array(
			'М'=>'Мужской',
			'Ж'=>'Женский'
		)
	)
);
echo $this->Form->input('Secretary.faculty_id',
	array(
		'label' => 'Факультет:', 
		'empty' => array('null'=>'Выберите значение'),
		'options' => $faculties_list			
	)
);
?>
</fieldset>
<?echo $this->Form->end(array('label'=>'Добавить секретаря', 'name' => 'data_sended'));?>