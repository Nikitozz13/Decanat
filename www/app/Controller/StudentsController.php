<?php
   class StudentsController extends AppController{
         public $components = array('Session');
         public $uses = array('Student', 'Person', 'GroupStudent');

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

   	   function add($group_id=1) {
            if (!is_null($group_id)) {
               $this->set('groupId', $group_id);
               $this->set('groups',$this->Student->GroupStudent->Group->find('list')); // TODO сделать фильтр по факультету серетаря
            } else {
               $this->Session->setFlash('Нужно выбрать группу');
               $this->redirect($this->request->referer());
            }
   	   }
         
         function save() {
            debug($this->request->data);
            if ($this->request->data) {
               debug('1');

               $dataSource = $this->Student->getDataSource();

               $dataSource->begin();

               $alrigrht = true;

               if($this->Person->save($this->request->data)) {
                  $this->request->data['Student']['person_id'] = $this->Person->id;
               } else {
                  $alrigrht = false;
               }

               if($this->Student->save($this->request->data)) {
                  $this->request->data['GroupStudent']['student_id'] = $this->Student->id;
               } else {
                  $alrigrht = false;
               }

               if($this->GroupStudent->save($this->request->data)) {
               } else {
                  $alrigrht = false;
               }

               if ($alrigrht) {
                  $dataSource->commit();
                  $this->Session->setFlash('Студент добавлен');
               } else {
                  $dataSource->rollback();
               }

            } else {
               debug('0');
               $this->Session->setFlash('Ошибка при добавлении студента');
            }     
         }
         
   }
?>