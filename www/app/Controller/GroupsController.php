<?php
   class GroupsController extends AppController {

   	   function index($course = 1) {
            $groups = $this->Group->index(1, $course); // заглушка TODO: передать id факультета секретаря 
            //debug($groups);

            $this->set('course', $course);
            $this->set('groups', $groups);
   	   }

   	   function students_from_group($group_id){ 
   	   		$groups = $this->Group->students_from_group($group_id);
   	   		//debug($groups);
               $this->set('groups', $groups);
               $this->Group->id = $group_id;
               $this->set('groupNumber', $this->Group->field('number'));   	   		
   	   }

         function groups_from_speciality($speciality_id){
            $groups = $this->Group->groups_from_speciality($speciality_id);
            //debug($groups);
            $this->set('groups', $groups);            
         }

   }
?>