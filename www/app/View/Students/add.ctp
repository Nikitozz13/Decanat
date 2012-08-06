<h2>Новый студент</h2>

<?
echo $this->Form->create('Student', 
	array(
		'action' => 'add'
	)
);
echo $this->Form->input('personal_number' ,array('label' => 'Персональный номер'));
echo $this->Form->input('last_name' ,array('label' => 'Фамилия'));
echo $this->Form->input('first_name' ,array('label' => 'Имя'));
echo $this->Form->input('sex' ,array('label' => 'Пол'));
echo $this->Form->input('Group' ,array('label' => 'Группа'));

echo $this->Form->end('Добавить студента');


?>


