<?php
   class StudentsController extends AppController{

   	   function index(){
   	   	  $this->set('students',$this->Student->find('all'));
   	   }
   }
?>