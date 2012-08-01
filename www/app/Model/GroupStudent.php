<?php
class GroupStudent extends AppModel {        
	public $name = 'GroupStudent';           //почему в документации написано что таблица должна называться Groups_Students
	/*public $belongsTo = array(               //а на деле пришлось назвать ее Group_Students
		'Student',
		'Group'
	);*/
}
?>