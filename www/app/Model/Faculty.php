<?php
class Faculty extends AppModel {
	public $name = 'Faculty';
	public $hasMany = 'Secretary';
   public $displayField = 'name';
	public $validate = array(
		'name' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Введите имя'
         ),
         'alphaNumeric' => array(
            'rule'    => 'alphaNumeric', //'/^[а-яa-z]$/i',
            'message' => 'Имя должно быть из букв'
         )
      )
	);

   public function faculties_list(){
      $list = $this->find('list');
      return $list;
   }

}
?>