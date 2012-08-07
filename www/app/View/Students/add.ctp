<h2>Новый студент</h2>

<?
//debug($groups);
echo $this->Form->create('Student', 
	array(
		'action' => 'save'
	)
);
echo $this->Form->input('Student.personal_number' ,array('label' => 'Персональный номер'));
echo $this->Form->input('Person.last_name' ,array('label' => 'Фамилия'));
echo $this->Form->input('Person.first_name' ,array('label' => 'Имя'));
echo $this->Form->input('Person.sex' ,array('label' => 'Пол'));
echo $this->Form->input('GroupStudent.group_id' ,array('label' => 'Группа'));

echo $this->Form->end('Добавить студента');


?>


