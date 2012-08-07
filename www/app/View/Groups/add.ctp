<h2> Добавление группы </h2>

<?
echo $this->Form->create('Group', 
  array(
    'action' => 'save'
  )
);

echo $this->Form->input('group_course', array('label' => 'Курс:')); //из курса будем выводить номер группы: первая цифра - курс, вторая - специальность

echo $this->Form->input('Group.education_form',
  array(
    'label' => 'Форма обучения:', 
    'empty' => array('null'=>'Выберите значение'),
    'options' => array(
                  'Очная'=>'Очная',
                  'Заочная'=>'Заочная'
                    )
  )
);
echo $this->Form->input('Group.entrant_year', array('label' => 'Год :'));
echo $this->Form->input('Group.speciality_id', array('label' => 'Специальность:')); //Нужно будет сделать перенаправление от id специальности к имени специальности, чтобы в выпадающем списке (select) появлялись не цифры id, а более понятные названия специальностей, которую нужно будет задать группе

echo $this->Form->end('Добавить группу');


?>