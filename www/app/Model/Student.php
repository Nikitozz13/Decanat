<?php
class Student extends AppModel {
	public $name = 'Student';
	public $belongsTo = 'Person';
	public $hasMany = 'GroupStudent';

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

}
?>