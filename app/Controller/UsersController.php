<?php

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
        $this->Auth->deny('index');
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect(array('action' => 'index')));
        } else {
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users',  $this->User->find('all'));
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                    __('Houveram problemas na criação de usuário.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        print_r($this->User->id);
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Usuário salvo.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                    __('Houveram problemas na edição de usuário.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            
            unset($this->request->data['User']['password']);
            unset($this->request->data['User']['role']);
            unset($this->request->data['User']['created']);
            unset($this->request->data['User']['modified']);
            echo "<pre>";
            print_r($this->request->data);
            echo "</pre>";
            
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário Inválido.'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário excluído.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Houveram problemas não exclusão do usuário.'));
        return $this->redirect(array('action' => 'index'));
    }
    
    public function control(){
        $this->set('users', $this->User->find('all'));
    }

}
