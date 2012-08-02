<?php
   class GroupsController extends AppController{

   	   function index() {
            $groups = $this->Group->group_list(1); // заглушка TODO: передать id факультета секретаря 
            debug($groups);
   	   	$this->set('groups', $groups);
   	   }
   }
?>