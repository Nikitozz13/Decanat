<?php
   class StudentsController extends AppController{

   	   function index() {
            $students = $this->Student->index(1); // заглушка TDOD: 
            //debug($students);
   	   	$this->set('students', $students);
   	   }
   }
?>