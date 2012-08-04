<?php
   class GroupsController extends AppController {

   	   function index($course = 1) {
            $groups = $this->Group->index(1, $course); // заглушка TODO: передать id факультета секретаря 
            //debug($groups);

            $this->set('course', $course);
            $this->set('groups', $groups);
   	   }

   	   function students_from_group($group_id){ 
   	   		$groups = $this->Group->students_from_group(1, $group_id); // заглушка TODO: передать id факультета секретаря
   	   		//debug($groups);
               $this->Group->id = $group_id;
               $this->set('groupNumber', $this->Group->field('number'));

   	   		$this->set('groups', $groups);
   	   }

   }
?>