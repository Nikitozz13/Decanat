<?php
   class SpecialitiesController extends AppController{
         public $uses = array('Speciality');

   	   function index() {
            $specialities = $this->Speciality->specialities_list(1); // заглушка TODO: передать id факультета секретаря 
            //debug($specialities);
   	   	$this->set('specialities', $specialities);
   	   }

   	   function students_from_speciality($speciality_id){ 
   	   		$specialities = $this->Speciality->students_from_speciality($speciality_id);
   	   		//debug($specialities);
   	   		$this->set('specialities', $specialities);
   	   }

         function add() {

         }

         function save () {

         }
   }
?>