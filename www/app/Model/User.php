<?php
class User extends AppModel {
	public $name = 'User';
	public $validate = array(
		'login' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Введите логин'
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Логин должен быть из букв и цифр'
			)
		),

		'password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Введите пароль'
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Пароль должен быть из букв и цифр'
			)
		),

		'secretary_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'нет ассоциированного секретаря'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'id секретаря должен быть числом'
			)
		)
	);
}
?>