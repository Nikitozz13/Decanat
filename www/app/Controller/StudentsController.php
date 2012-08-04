<?php
   class StudentsController extends AppController{

   	   function index() {
            $students = $this->Student->students_list(1); // заглушка TODO: передать id факультета секретаря 
            //debug($students);
   	   	$this->set('students', $students);
   	   }

         function students_from_group($group_id){ 
               $students = $this->Student->students_from_group($group_id);
               //debug($students);
               $this->set('students', $students);
               $this->set('groupNumber', $this->requestAction("/groups/get_number/$group_id"));        // ??? правильно ли, или я изобретаю вело, и есть способ проще,        
         }

   	   function add() {
   	   
   	   }
   }
?>