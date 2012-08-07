<?php
class Person extends AppModel {
	public $name = 'Person';
	public $hasMany = 'Student';
	public $validate = array(
      'first_name' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Введите имя'
         ),
         'numeric' =>array(
            'rule'    => '/^[а-яa-z]$/i',
            'message' => 'Имя должно быть из букв'
         )
      ),

      'last_name' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Введите фамилию'
         ),
         'numeric' =>array(
            'rule'    => '/^[а-яa-z]$/i',
            'message' => 'Фамилия должна быть из букв'
         )
      ),

      'birthday' => array(
         'date' =>array(
            'rule'    => 'date',
            'message' => 'Введите корректный день рождения',
            'allowEmpty' => true
         )
      ),

      'sex' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Выберите пол'
         ),
         'inList' =>array(
            'rule'    => array('inList', array('М','Ж')),
            'message' => 'Пол: М или Ж'
         )
      ),

   );



}
?>