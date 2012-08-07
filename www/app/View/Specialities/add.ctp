<h2>Новая специальность</h2>

<? 
echo $this->Form->create('Speciality', 
  array(
    'action' => 'save'
  )
);

echo $this->Form->input('name', array('label' => 'Имя:'));

echo $this->Form->end('Добавить специальность');


?>