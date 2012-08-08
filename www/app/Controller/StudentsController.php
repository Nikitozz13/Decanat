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

   	   function add($group_id) {
            if($this->request->data($data_sended)){
               debug('данные присланы сохранение');
               $this->save();
            } else {
               debug('данных нет');
               if (!is_null($group_id)) {
                  $this->set('groupId', $group_id);
                  $this->set('groupNumber',$this->requestAction("/groups/get_number/$group_id"));
               } else {
                  $this->Session->setFlash('Выберете группу для добавления студентов', 'default', array('class' => 'alert alert-error'));
                  $this->redirect('/groups');
               }
            }
   	   }
         
         function save() {
               if ($this->request->data) {
               debug('ветка да');


               $dataSource = $this->Student->getDataSource();
               $dataSource->begin();
               $allright = true;

               if($this->Person->save($this->request->data)) {
                     $this->request->data['Student']['person_id'] = $this->Person->id;

                     if($this->Student->save($this->request->data)) {
                           $this->request->data['GroupStudent']['student_id'] = $this->Student->id;

                           if($this->GroupStudent->save($this->request->data)) {
                           } else {
                              $allright = false;
                           }

                     } else {
                        $allright = false;
                     }


               } else {
                  $allright = false;
               }                     

               if ($allright) {
                  $dataSource->commit();
                  $this->Session->setFlash('Студент добавлен', 'default', array('class' => 'alert alert-success'));
               } else {
                  $dataSource->rollback();
                  $this->Session->setFlash('Ошибка', 'default', array('class' => 'alert alert-error'));
               }


            } else {
               debug('ветка нет');
               $this->Session->setFlash('Ошибка при добавлении студента', 'default', array('class' => 'alert alert-error'));
            }  
         //$this->render('add');   
         }
         
   }
?>