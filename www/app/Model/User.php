<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	public $name = 'User';
	public $belongsTo = 'Secretary';
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

	public function beforeSave($options = array()){
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

	public function save_user($data){ 
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		$allright = true;

		if($this->Secretary->Person->save($data)) {
		    $data['Secretary']['person_id'] = $this->Secretary->Person->id;
		   		    	
	    	if($this->Secretary->save($data)) {
	    		$data['User']['secretary_id'] = $this->Secretary->id;		    		
	    		
	    		if($this->save($data)) {
			    } else {
			       $allright = false;
			    }
			} else {
				$allright = false;
			}	
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