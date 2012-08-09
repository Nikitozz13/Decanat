<?php
class GroupsController extends AppController {
   public $uses = array('Group', 'Speciality', 'EducationForm');

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

   public function add() {
      $this->set('education_forms_list', $this->EducationForm->find('list'));
      $this->set('specialities_list', $this->Speciality->specialities_list(1)); // TODO передать id факультета серкетаря
      if($this->request->data('data_sended')){
         debug('данные присланы сохранение');
         $this->Group->create();           
         if($this->Group->save_group($this->request->data)){
            $this->Session->setFlash('Группа добавлена', 'default', array('class' => 'alert alert-success'));
            $this->render();
         } else {
            $this->Session->setFlash('Ошибка', 'default', array('class' => 'alert alert-error'));
         };

      } else {
         debug('данных нет'); 
      }
   }


   }
?>