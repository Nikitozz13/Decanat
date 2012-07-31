<?php
   class StudentsController extends AppController{

   	  /* $options['joins'] = array(
   	   	   array('table' => 'people',
   	   	   	'alias' => 'Person',
   	   	   	'type' => 'LEFT',
   	   	   	'conditions' => array(
   	   	   		'Person.id = Student.person_id',
   	   	   		)

   	   	   )
   	    );*/


   	   function index(){
            $students = $this->Student->find('all');
            //debug($students);
   	   	$this->set('students', $students);
   	   }
   }
?>