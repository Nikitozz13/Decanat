<?php
class GroupStudent extends AppModel {        
	public $name = 'GroupStudent';
	public $belongsTo = array(
		'Student',
		'Group'
	);

	public $validate = array(
		'group_id' => array(
		    'notEmpty' =>array(
			    'rule' => 'notEmpty',
			    'message' => 'пустой  group_id'
			),
	    	'numeric' =>array(
			    'rule' => 'numeric',
			    'message' => 'не числовой group_id'
	    	)
	    ),

	    'student_id' => array(
		    'notEmpty' =>array(
			    'rule' => 'notEmpty',
			    'message' => 'пустой  student_id'
			),
	    	'numeric' =>array(
			    'rule' => 'numeric',
			    'message' => 'не числовой student_id'
	    	)
	    )
	);
}
?>