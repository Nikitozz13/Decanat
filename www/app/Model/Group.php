<?php
class Group extends AppModel {
	public $name = 'Group';
	public $belongsTo = [
		'Speciality',
		'Education_form' => array(
			'className' => 'Education_form',
			'foreignKey' => 'education_form'
		)
	];
	public $hasMany = 'GroupStudent';

	public function group_list($faculty_id){
		$options['recursive'] = 2;
		$options['conditions'] = array(
			'Speciality.faculty_id' => $faculty_id
		);
		return $this->find('all',$options);
	}
}
?>