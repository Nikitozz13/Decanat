<?php
class Student extends AppModel {
	public $name = 'Student';
	public $belongsTo = 'Person';
	public $hasMany = 'GroupStudent';

   public $validate = array(
      'personal_number' => array(
         'notEmpty' => array(
            'rule' => 'notEmpty',
            'message' => 'Введите персональный номер студента'
         ),

         'numeric' =>array(
            'rule' => 'numeric',
            'message' => 'Персональный номер должен быть числом'
         )
      ),

      'person_id' => array(
            'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'пустой  person_id'
         ),
            'numeric' =>array(
            'rule' => 'numeric',
            'message' => 'не числовой person_id'
         )
      )
   );

	public function students_list($faculty_id) {
            $options['joins'] = array(
               
               array(                  
                  'table'=>'group_students',
                  'alias'=>'GroupStudent',
                  'type'=>'inner',
                  'conditions'=>array(
                     'GroupStudent.student_id = Student.id'
                  )
               ),
               array(                  
                  'table'=>'groups',
                  'alias'=>'Group',
                  'type'=>'inner',
                  'conditions'=>array(
                     'GroupStudent.group_id = Group.id'
                  )
               ),
                

              array(
                  'table'=>'Specialities',
                  'alias'=>'Speciality',
                  'type'=>'inner',
                  'conditions'=>array(
                     'Group.speciality_id = Speciality.id'
                  )
               ),

               array(
                  'table'=>'Faculties',
                  'alias'=>'Faculty',
                  'type'=>'inner',
                  'conditions' => array(
                     'Speciality.faculty_id = Faculty.id'
                  )
               )
            );

            $options['conditions'] = array(
               'Faculty.id' => $faculty_id
            );

            $options['fields'] = array('Group.number', 'Group.id', 'Student.id', 'Student.personal_number', 'Person.last_name', 'Faculty.name', 'Faculty.id');

            $students = $this->find('all', $options);

            return $students;
       	}

   public function students_from_group($group_id){ 
      $options['joins'] = array(

         array(
            'table' => 'group_students',
            'alias' => 'GroupStudent',
            'type'=>'inner',
            'conditions' => array(
               'Student.id = GroupStudent.student_id'
            )
         ),

         /*array(
            'table' => 'students',
            'alias' => 'Student',
            'type'=>'inner',
            'conditions' => array(
               'GroupStudent.student_id = Student.id'
            )
         ),*/
         array(
            'table' => 'groups',
            'alias' => 'Group',
            'type'=>'inner',
            'conditions' => array(
               'Group.id' => $group_id,
               'Group.id = GroupStudent.group_id'
            )
         ),


        /* array(
            'table' => 'people',
            'alias' => 'Person',
            'type'=>'inner',
            'conditions' => array(
               'Student.person_id = Person.id'
            )
         ),*/

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

      $options['fields'] = '*';

      return $this->find('all', $options);
   }


   public function save_student($data){
      $dataSource = $this->getDataSource();
      $dataSource->begin();
      $allright = true;

      if($this->Person->save($data)) {
            $data['Student']['person_id'] = $this->Person->id;

            if($this->save($data)) {
                  $data['GroupStudent']['student_id'] = $this->id;

                  if($this->GroupStudent->save($data)) {
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