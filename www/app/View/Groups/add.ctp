<h2> Добавление группы </h2>

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
echo $this->Form->input('Group.entrant_year', array('type' =>'date', 'label' => 'Дата поступления:'));
echo $this->Form->input('Group.speciality_id', array(
    'label' => 'Специальность:',
    'options' => $specialities_list
  )
); 

echo $this->Form->end(array('label'=>'Добавить группу', 'name' => 'data_sended'));
?>