<h2> Добавление группы </h2>

<link type="text/css" href="/css/ui-darkness/jquery-ui-1.8.22.custom.css" rel="stylesheet" />
<script src="/js/jquery-ui-1.8.22.custom.min.js" type="text/javascript"></script>
<script src="/js/i18n/jquery-ui-i18n.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
	});
</script>

<script type="text/javascript">
	$(function(){
		$.datepicker.setDefaults(
			$.extend($.datepicker.regional["ru"])
		);
	});
</script>

<?
echo $this->Form->create('Group');

echo $this->Form->input('Group.number', array('label' => 'Номер:'));
echo $this->Form->input('Group.education_form',
  array(
    'label' => 'Форма обучения:', 
    'empty' => array('null'=>'Выберите значение'),
    'options' => $education_forms_list
  )
);
echo $this->Form->input('Group.entrant_year', array('id' => 'datepicker', 'type' =>'text', 'label' => 'Дата поступления:'));
echo $this->Form->input('Group.speciality_id', array(
    'label' => 'Специальность:',
    'options' => $specialities_list
  )
); 

echo $this->Form->end(array('label'=>'Добавить группу', 'name' => 'data_sended'));
?>