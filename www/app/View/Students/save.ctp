<h2>Добавление студента в  группу</h2>


<?
echo $this->Form->create('Student', 
	array(
		'action' => 'save'
	)
);
echo $this->Form->input('Student.personal_number', array('label' => 'Персональный номер'));
echo $this->Form->input('Person.last_name', array('label' => 'Фамилия'));
echo $this->Form->input('Person.first_name', array('label' => 'Имя'));
echo $this->Form->input('Person.birthday', array('label' => 'Днеь рождения',  'empty' => array('null'=>'Выберите значение')));
echo $this->Form->input('Person.sex',
	array(
		'label' => 'Пол', 
		'options' => array(
			'М'=>'Мужской',
			'Ж'=>'Женский'
		)
	)
);
echo $this->Form->input('GroupStudent.group_id', array('type' => 'hidden', 'value' => $groupId));

echo $this->Form->end('Добавить студента');


?>