<?php
class Group extends AppModel {
	public $name = 'Group';
	public $belongsTo = [						
		'Speciality',							//  ??? вопрос про одинаковые алиасы и повторение в sql запросе таблиц
		'Education_form' => array(
			'className' => 'Education_form',
			'foreignKey' => 'education_form'
		)
	];
	public $hasMany = 'GroupStudent';

	public function index($faculty_id, $course){
		$options['joins'] = array(

			array(
				'table' => 'specialities',
				'type'=>'inner',
				'conditions' => array(
					'Group.speciality_id = specialities.id'
				)
			),

			array(
				'table' => 'faculties',
				'alias' => 'Faculty',
				'type'=>'inner',
				'conditions' => array(
					'Faculty.id = specialities.faculty_id'
				)
			)
		);

		/*$currentDate = new DateTime();                                    попытка вычислить курс, используя текущую дату и дату поступления
        $entrantDate = DateTime::createFromFormat('Y-m-d', '2011-09-01');

        $dateDiff = date_diff($currentDate, $entrantDate);
        $realCourse = $dateDiff->y;*/

		$options['conditions'] = array(
			'Speciality.faculty_id' => $faculty_id,
			'Group.number LIKE' => $course . '_'
		);
		$options['fields'] = '*';
		return $this->find('all',$options);
	}

	

	public function students_from_group($group_id){ 
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
				'type'=>'inner',
				'conditions' => array(
					'Group.speciality_id = specialities.id'
				)
			),

			array(
				'table' => 'faculties',
				'alias' => 'Faculty',
				'type'=>'inner',
				'conditions' => array(
					'Faculty.id = specialities.faculty_id'
				)
			)
		);

		$options['fields'] = '*';

		return $this->find('all', $options);
	}


	public function groups_from_speciality($speciality_id){
		$options['conditions'] = array(
			'Group.speciality_id' => $speciality_id
		);

		return $this->find('all',$options);

	}
}
?>