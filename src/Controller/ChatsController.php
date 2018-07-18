<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class ChatsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('');
    }
    public function index()
    {
		$Users = [];
		$menu = ["menu"=>"chats","menu_type"=>"chats"];
		$this->set(compact('Users','menu'));
        $this->set('_serialize', ['Users','menu']);
    }

	public function jobs(){
		$jobsTable = TableRegistry::get('Jobs');
		$jobs = $jobsTable->find('all')->toArray();
		$error_code = 0;
		$error_message = 'Successfully registered.';
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$jobs,
					'_serialize' => ['error_code','error_message','result']]);
	}
}
