<?php
class UsersController extends AppController {
   public $uses = array('Faculty','User');
   public function beforeFilter(){
      parent::beforeFilter();
      $this->Auth->allow('login', 'logout', 'add');
   }

   public function login(){
      if ($this->request->is('post')) {
         if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
         } else {
            $this->Session->setFlash('Вы не идентифицированы и подлежите переработке, не сопротивляйтесь');
         }
      }
   }

   public function logout(){
      $this->redirect($this->Auth->logout());
   }


   public function add() {
      $this->set('faculties_list', $this->Faculty->faculties_list());
      if($this->request->data('data_sended')){      // нажали на кнопку - значит пытаемся сохранить
         //debug('данные присланы сохранение');
         $this->User->create();           
         if($this->User->save_user($this->request->data)){
            $this->Session->setFlash('Секретарь добавлен', 'default', array('class' => 'alert alert-success'));
            //$this->render();
            $this->redirect("/users/login");
         } else {
            $this->Session->setFlash('Ошибка', 'default', array('class' => 'alert alert-error'));
         };

      } else {               // на кнопку не нажимали - занимаемся только отображением страницы
         //debug('данных нет'); 
      }
   }
}
?>