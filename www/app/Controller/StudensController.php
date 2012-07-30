<?php
   class Students extends AppController {
   	   var $name = 'Students';

   	   function index(){
   	   	  $this->set('Students',$this->Student->findAll());
   	   }
   }
?>