<?php
   class StudentsController extends AppController{
         public $components = array('Session');

   	   function index() {
            $students = $this->Student->students_list(1); // заглушка TODO: передать id факультета секретаря 
            //debug($students);
   	   	$this->set('students', $students);
   	   }

         function students_from_group($group_id){ 
               $students = $this->Student->students_from_group($group_id);
               //debug($students);
               $this->set('students', $students);
               $this->set('groupId', $group_id);              
               $this->set('groupNumber', $this->requestAction("/groups/get_number/$group_id"));        // ??? правильно ли, или я изобретаю вело, и есть способ проще,        
         }

   	   function add($group_id = NULL) {
            $this->set('groups',$this->Student->GroupStudent->Group->find('list')); // TODO сделать фильтр по факультету серетаря
            $ref = $this->request->referer();
            debug($ref);
            if(!is_null($group_id))
               $this->set('groupId',$group_id);
            if($this->request->is('post')){
               if($this->Student->save($this->request->data)){
                  $this->Session->setFlash('Студнет добавлен');
                  $this->redirect($ref);
               }
               else
                  $this->Session->setFlash('Ошибка при добавлении студента');
            }	   
   	   }
         
         function Addnew() {

         }

         function action() {
               
         }

   }
?>