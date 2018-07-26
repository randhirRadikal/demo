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

	public function updateProfile(){
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['name'] = isset($data['name'])?$data['name']:'';
			$required['email'] = isset($data['email'])?$data['email']:'';
			$data['profilePic'] = isset($data['profilePic'])?$data['profilePic']:false;
			
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
				$this->Flash->error(__('Please enter required field.'));
		    }else{
				$Admin = $this->Admins->get($this->Auth->user('id'));
				$Admin->email = $data['email'];
				$Admin->name = $data['name'];
				if(!empty($data['profilePic'])){
					if($data['profilePic']['name']){
						$Admin->profile_pic = $this->__upload_file($data['profilePic'],'admins');
					}
				}
				if($this->Admins->save($Admin)){
					$this->Auth->setUser($Admin);
					$this->Flash->success(__('Profile updated successfully.'));
				}else{
					$this->Flash->error(__('Something is wrong, please try again later.'));
				}
			}
		}
		return $this->redirect(['controller'=>"Admins",'action' => 'view']);
	}

	public function changePassword(){
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['old_password'] = isset($data['old_password'])?$data['old_password']:'';
          	$required['password1'] = isset($data['password1'])?$data['password1']:'';
          	$required['password2'] = isset($data['password2'])?$data['password2']:'';
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
				$this->Flash->error(__('Please enter required field.'));
		    }else{
				$Admin = $this->Admins->get($this->Auth->user('id'));
				echo $this->Admins->checkPassword($data['old_password'],$Admin->password);
				exit;
				if($this->Admins->save($Admin)){
					$this->Flash->success(__('Profile updated successfully.'));
				}else{
					$this->Flash->error(__('Something is wrong, please try again later.'));
				}
			}
		}
		return $this->redirect(['controller'=>"Admins",'action' => 'view']);
	}

	public function view()
	{
		$Admin = $this->Admins->get($this->Auth->user('id'));
		$menu = ["menu"=>"","menu_type"=>"","admin"=>$this->Auth->user()];
		$this->set(compact('Admin','menu'));
		$this->set('_serialize', ['Admin','menu']);
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
