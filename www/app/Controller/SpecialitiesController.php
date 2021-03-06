<?php
   class SpecialitiesController extends AppController{
         public $uses = array('Speciality');

   	   function index() {
            $specialities = $this->Speciality->index($this->Auth->user('Secretary.faculty_id')); // заглушка TODO: передать id факультета секретаря 
            //debug($specialities);
   	   	$this->set('specialities', $specialities);
   	   }

   	   function students_from_speciality($speciality_id){ 
   	   		$specialities = $this->Speciality->students_from_speciality($speciality_id);
   	   		//debug($specialities);
   	   		$this->set('specialities', $specialities);
   	   }

         function add() {
            $this->set('faculty_id', $this->Auth->user('Secretary.faculty_id'));
            if ($this->request->data('data_sended')) {
               
               if ($this->Speciality->save_speciality($this->request->data)) {
                  $this->Session->setFlash('Специальность добавлена', 'default', array('class' => 'alert alert-success'));
                  //$this->redirect("/specialities");
               } else {
                  $this->Session->setFlash('Ошибка', 'default', array('class' => 'alert alert-error'));
               }
            } else {
               //debug('данных нет');
            }

         }

   }
?>