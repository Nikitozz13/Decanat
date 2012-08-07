<?php
class Speciality extends AppModel {
   public $name = 'Speciality';
   public $belongsTo = 'Faculty';

   public $validate = array(
      'name' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Введите имя для специальности'
         )
      ),
      
      'code' => array(
         'rule' => 'numeric',
         'message' => 'Код должен быть числовой',
         'allowEmpty' => true
      ),  

      'duration' => array(
         'notEmpty' =>array(
            'rule' => 'notEmpty',
            'message' => 'Выберите продолжительность обучения'
         ),
         'numeric' =>array(
            'rule' => 'numeric',
            'message' => 'Продолжительность обучения - число'
         )
      )
   );

	public function specialities_list($faculty_id) {

            $options['conditions'] = array(
               'Faculty.id' => $faculty_id
            );

            $options['fields'] = '*';

            return $this->find('all', $options);
   }

   public function students_from_speciality($speciality_id){
      $options['joins'] = array(
         array(
            'table' => 'groups',
            'alias' => 'Group',
            'type'=>'inner',
            'conditions' => array(
               'Group.speciality_id = Speciality.id'
            )
         ),

         array(
            'table' => 'group_students',
            'alias' => 'GroupStudent',
            'type'=>'inner',
            'conditions' => array(
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
         )
      );
   $options['conditions'] = array(
      'Speciality.id' => $speciality_id
   );

   $options['fields'] = '*';

   $specialities = $this->find('all', $options);

   return $specialities;
   }


}
?>