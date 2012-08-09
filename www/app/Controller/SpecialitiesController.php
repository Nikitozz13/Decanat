<?php
   class SpecialitiesController extends AppController{
         public $uses = array('Speciality');

   	   function index() {
            $specialities = $this->Speciality->index(1); // заглушка TODO: передать id факультета секретаря 
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
            if ($this->request->data) {

               $dataSource = $this->Speciality->getDataSource();
               $dataSource->begin();
               $allright = true;

               if ($this->Speciality->save($this->request->data)) {
               } else {
                  $allright = false;
                  }

               if ($allright) {
                  $dataSource->commit();
                  $this->Session->setFlash('Специальность добавлена', 'default', array('class' => 'alert alert-success'));
               } else {
                  $dataSource->rollback();
                  $this->Session->setFlash('Ошибка', 'default', array('class' => 'alert alert-error'));
                  }

            } else {
               debug('ветка нет');
               $this->Session->setFlash('Ошибка при добавлении студента', 'default', array('class' => 'alert alert-error'));
               }
         }
   }
?>