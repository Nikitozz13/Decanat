<?php
   class GroupsController extends AppController{

   	   function index() {
            $groups = $this->Group->group_list(1); // заглушка TODO: передать id факультета секретаря 
            //debug($groups);
   	   		$this->set('groups', $groups);
   	   }

   	   function students_from_group($group_id){ 
   	   		$groups = $this->Group->students_from_group(1, $group_id); // заглушка TODO: передать id факультета секретаря
   	   		//debug($groups);
   	   		$this->set('groups', $groups);
   	   }

   }
?>