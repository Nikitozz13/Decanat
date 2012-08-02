<?php
class Speciality extends AppModel {
   public $name = 'Speciality';
   public $belongsTo = 'Faculty';

	public function specialities_list($faculty_id) {
            /*$options['joins'] = array(
               array(
                  'table'=>'Faculties',
                  'alias'=>'Faculty',
                  'type'=>'inner',
                  'conditions' => array(
                     'Speciality.faculty_id = Faculty.id'
                  )
               )
            );*/

            $options['conditions'] = array(
               'Faculty.id' => $faculty_id
            );

            $options['fields'] = '*';

            return $this->find('all', $options);
   }

   public function students_from_speciality($faculty_id, $speciality_id){
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

   $options['fields'] = '*';

   $specialities = $this->find('all', $options);

   return $specialities;
   }


}
?>