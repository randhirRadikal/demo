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
		$menu = ["menu"=>"chats","menu_type"=>"chats","admin"=>$this->Auth->user()];
		$this->set(compact('Users','menu'));
        $this->set('_serialize', ['Users','menu']);
    }

	public function jobs(){
		$jobsTable = TableRegistry::get('Jobs');
		$jobs = $jobsTable->find('all')
			->contain(['Bids' => function(\Cake\ORM\Query $q) {
				return $q->where(['Bids.status' => 'Approved']);
			}, 'Users','Bids.Users','JobImages'])
			->where(['Jobs.status != '=>'Pending'])
			->where(['Jobs.status != '=>'Inactive'])
			->toArray();
		$error_code = 0;
		$error_message = 'Successfully registered.';
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$jobs,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function messages(){
		$error_code = 1;
		$error_message = "This is post method";
		$result = [];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['job_id'] = isset($data['job_id'])?$data['job_id']:'';
			$data['user_id'] = $this->Auth->user('id');
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
		        $error_message = 'Please enter required field.';
		    }else{
				//
				$jobsTable = TableRegistry::get('JobMessages');
				$usersTable = TableRegistry::get('Users');
				$result = $jobsTable->find('all')->where(['JobMessages.job_id'=>$data['job_id']])->toArray();
				$error_code = 0;
				$error_message = 'Successfully.';
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}
}
