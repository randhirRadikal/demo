<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class JobMessagesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('login');
    }
    public function index()
    {
		$Users = $this->Chats->find('all');

		$menu = ["menu"=>"chats","menu_type"=>"chats"];
		$this->set(compact('Users','menu'));
        $this->set('_serialize', ['Users','menu']);
    }

    public function contractors($id = null)
    {
		$Users = $this->Users->find('all')->where(['Users.type'=>'Contractor'])->toArray();
		$jobsTable = TableRegistry::get('Jobs');
		foreach ($Users as $key => $value) {
			$Users[$key]['jobs_completed']=$jobsTable->find('all')->where(['user_id'=>$value['id'],'status'=>'Completed'])->count();
			$Users[$key]['jobs_cancelled']=$jobsTable->find('all')->where(['user_id'=>$value['id'],'status'=>'Cancelled'])->count();
			$Users[$key]['jobs_posted']=$jobsTable->find('all')->where(['user_id'=>$value['id']])->count();
		}
		$menu = ["menu"=>"contractors","menu_type"=>"manpower"];
		$this->set(compact('Users','menu'));
        $this->set('_serialize', ['Users','menu']);
    }
}
