<?php
class Group extends AppModel {
	public $name = 'Group';
	public $belongsTo = array(						
		'Speciality',							//  ??? вопрос про одинаковые алиасы и повторение в sql запросе таблиц
		'Education_form' => array(
			'className' => 'Education_form',
			'foreignKey' => 'education_form'
		)
	);
	public $hasMany = 'GroupStudent';
	public $displayField = 'number';
	public $validate = array(
		'number' => array(
			'notEmpty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Номер группы не может быть пустым'
			),
			'numeric' =>array(
				'rule' => 'numeric',
				'message' => 'Номер группы должен быть числом'
			)
		),

		'education_form' => array(
			'notEmpty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Пустой education_form'
			),
			'numeric' =>array(
				'rule' => 'numeric',
				'message' => 'не числовой education_form'
			)
		),

		'entrant_year' => array(
			'notEmpty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Выберете дату'
			),
			'date' =>array(
				'rule' => 'date',
				'message' => 'Введите корректную дату дату'
			)
		),

		'speciality_id' => array(
			'notEmpty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Пустой speciality_id'
			),
			'numeric' =>array(
				'rule' => 'numeric',
				'message' => 'не числовой speciality_id'
			)
		)

	);

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


	public function groups_from_speciality($speciality_id){
		$options['conditions'] = array(
			'Group.speciality_id' => $speciality_id
		);

		return $this->find('all',$options);

	}

	public function save_group($data){
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		$allright = true;

		if($this->save($data)) {
			
		} else {
			$allright = false;
		}                     

		if ($allright) {
			$dataSource->commit();
			return true;
		} else {
			$dataSource->rollback();
			return false;
		}
	}
}
?>