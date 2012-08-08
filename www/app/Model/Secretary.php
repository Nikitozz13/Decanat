<?php
class Secretary extends AppModel {
	public $name = 'Secretary';
	public $belongsTo = array('Faculty', 'Person');
	Public $hasOne = array('User');
	public $validate = array(
		'person_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'нет ассоциированного person'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'id person должен быть числом'
			)
		),

		'faculty_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'нет ассоциированного faculty'
			),
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'id faculty должен быть числом'
			)
		)
	);
	
}
?>