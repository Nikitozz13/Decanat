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
   	   	  $this->set('students',$this->Student->find('all'/*,$options*/));
   	   }
   }
?>