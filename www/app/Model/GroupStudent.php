<?php
class GroupStudent extends AppModel {        
	public $name = 'GroupStudent';
	public $belongsTo = array(
		'Student',
		'Group'
	);
}
?>