<?php
class Group extends AppModel {
	public $name = 'Group';
	/*public $belongsTo = [						если раскоментить то ругается  на одинаковые алиасы
		'Speciality',							но если раскоментить только hasMany то, хоть одинаковые алиасы и есть, но не ругается
		'Education_form' => array(
			'className' => 'Education_form',
			'foreignKey' => 'education_form'
		)
	];
	public $hasMany = 'GroupStudent';*/

	public function index($faculty_id, $course){
		//$options['recursive'] = 2;
		$options['joins'] = array(

			array(
				'table' => 'education_forms',
				'alias' => 'Education_form',
				'type'=>'inner',
				'conditions' => array(
					'Group.education_form = Education_form.id'
				)
			),

			array(
				'table' => 'specialities',
				'alias' => 'Speciality',
				'type'=>'inner',
				'conditions' => array(
					'Group.speciality_id = Speciality.id'
				)
			),

			array(
				'table' => 'faculties',
				'alias' => 'Faculty',
				'type'=>'inner',
				'conditions' => array(
					'Faculty.id = Speciality.faculty_id'
				)
			)
		);

		$currentDate = new DateTime();
        $entrantDate = DateTime::createFromFormat('Y-m-d', '2011-09-01');

        $dateDiff = date_diff($currentDate, $entrantDate);
        $realCourse = $dateDiff->y;

		$options['conditions'] = array(
			'Speciality.faculty_id' => $faculty_id,
			'Group.number LIKE' => $course . '_'
		);
		$options['fields'] = '*';
		return $this->find('all',$options);
	}

	

	public function students_from_group($faculty_id, $group_id){
		$options['joins'] = array(

			array(
				'table' => 'group_students',
				'alias' => 'GroupStudent',
				'type'=>'inner',
				'conditions' => array(
					'Group.id' => $group_id,
					'Group.id = GroupStudent.group_id'
				)
			),

			array(
				'table' => 'students',
				'alias' => 'Student',
				'type'=>'inner',
				'conditions' => array(
					'GroupStudent.student_id = Student.id'
				)
			),

			array(
				'table' => 'people',
				'alias' => 'Person',
				'type'=>'inner',
				'conditions' => array(
					'Student.person_id = Person.id'
				)
			),

			array(
				'table' => 'specialities',
				'alias' => 'Speciality',
				'type'=>'inner',
				'conditions' => array(
					'Group.speciality_id = Speciality.id'
				)
			),

			array(
				'table' => 'faculties',
				'alias' => 'Faculty',
				'type'=>'inner',
				'conditions' => array(
					'Faculty.id' => $faculty_id,
					'Faculty.id = Speciality.faculty_id'
				)
			)
		);

	$options['fields'] = '*';

	$groups = $this->find('all', $options);

    return $groups;
	}
}
?>