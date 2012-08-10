<h2>Добавление студента в <?=$groupNumber?> группу</h2>

<link type="text/css" href="css/ui-darkness/jquery-ui-1.8.22.custom.css" rel="stylesheet" />
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.22.custom.min.js" type="text/javascript"></script>
<script src="js/i18n/jquery-ui-i18n.js" type="text/javascript"></script>

<? echo $this->Form->input('Person.birthday', array('id' => 'datepicker', 'type' => 'text', 'label' => 'jQuery:',  'empty' => array('null'=>'Выберите значение'))); ?>


<script type="text/javascript">
$(function() {
  $("#datepicker").datepicker();
});
</script>

<script type="text/javascript">
$(function(){
  $.datepicker.setDefaults(
        $.extend($.datepicker.regional["ru"])
  );
  $("#datepicker").datepicker();
});
</script>

<?
echo $this->Form->create('Student');
echo $this->Form->input('Student.personal_number', array('label' => 'Персональный номер:'));
echo $this->Form->input('Person.last_name', array('label' => 'Фамилия:'));
echo $this->Form->input('Person.first_name', array('label' => 'Имя:'));
//echo $this->Form->input('Person.birthday', array('label' => 'Днеь рождения:',  'empty' => array('null'=>'Выберите значение')));
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
echo $this->Form->input('GroupStudent.group_id', array('type' => 'hidden', 'value' => $groupId));

echo $this->Form->end(array('label'=>'Добавить студента', 'name' => 'data_sended'));


?>


