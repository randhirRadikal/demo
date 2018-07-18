<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AdminsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('login');
    }
    public function index()
    {
        if(!$this->isAuthorized()){
          return $this->redirect(['action' => 'login']);
        }
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view()
    {
		$menu = ["menu"=>"","menu_type"=>"job"];
		$this->set(compact('newJobs','menu'));
        $this->set('_serialize', ['newJobs','menu']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        if(!$this->isAuthorized()){
          return $this->redirect(['action' => 'login']);
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        if(!$this->isAuthorized()){
          return $this->redirect(['action' => 'login']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->isAuthorized()){
          return $this->redirect(['controller'=>"Jobs",'action' => 'newPosts']);
        }
        $this->viewBuilder()->layout('login');
        $user = "";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
			//pr($data); exit;
            $user = $this->Auth->identify();
			// pr($user);
			// exit;
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Logged in successfully.'));
                return $this->redirect(['controller'=>"Jobs",'action' => 'newPosts']);
            }
            else {
                $this->Flash->error(__('Please enter valied email and password.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function logout()
    {
        $this->Auth->logout();
        $this->Flash->success(__('Logout successfully.'));
        return $this->redirect(['action' => 'login']);
    }
}
