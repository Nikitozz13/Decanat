<?php
   class GroupsController extends AppController {
      public $uses = array('Group', 'Speciality');

   	   function index($course = 1) {
            $groups = $this->Group->index(1, $course); // заглушка TODO: передать id факультета секретаря 
            //debug($groups);

            $this->set('course', $course);
            $this->set('groups', $groups);
   	   }
   	  
         function groups_from_speciality($speciality_id){
            $groups = $this->Group->groups_from_speciality($speciality_id);
            //debug($groups);
            $this->set('groups', $groups);            
         }

         function get_number($group_id){
            $this->Group->id = $group_id;
            return $this->Group->field('number');
         }

         function add() {

         }

         function save() {

         }

   }
?>