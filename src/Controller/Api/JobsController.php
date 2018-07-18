<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class JobsController extends AppController
{
	public function initialize(){
        parent::initialize();
		$this->Auth->allow(['']);
    }

	public function index(){

	}

	public function addJobs(){
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['email'] = isset($data['email'])?$data['email']:'';
			$required['password'] = isset($data['password'])?$data['password']:'';
			$required['name'] = isset($data['name'])?$data['name']:'';
			$required['type'] = isset($data['type'])?$data['type']:'';
			$required['phone_number'] = isset($data['phone_number'])?$data['phone_number']:'';
			$required['username'] = isset($data['username'])?$data['username']:'';
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
		        $error_message = 'Please enter required field.';
		    }else{
				if($this->Users->emailCheck($data['email']) == 0){
		          	$user = $this->Users->newEntity();
		            $user = $this->Users->patchEntity($user, $data);
		            if ($this->Users->save($user)) {
						$error_code = 0;
  	  					$error_message = 'Successfully registered.';
		            } else {
		              $error_message = "The user could not be saved, Please, try again.";
		            }
		        }else{
		          $error_message = "Email already exists";
		        }
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					'_serialize' => ['error_code','error_message']]);
	}

	public function bidsLists(){
		$error_code = 1;
		$error_message = "This is post method";
		$result=[];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$userId = $this->Auth->user('id');
			$result = $this->Jobs->find('all')->contain(['Bids','JobImages'])->where(['Jobs.user_id'=>$userId,'Bids.created_by'=>$userId])->toArray();
			$error_code = 0;
			$error_message="Successfully";
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function allBidsList(){
		$error_code = 1;
		$error_message = "This is post method";
		$result=[];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$userId = $this->Auth->user('id');
			$jobs = $this->Jobs->find('all')->contain(['Bids'])->where(['Jobs.user_id'=>$userId])->toArray();
			$result = [];
			foreach ($jobs as $key => $value) {
				$result[]=$value;
			}
			$error_code = 0;
			$error_message="Successfully";
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function bidDetails(){
		$error_code = 1;
		$error_message = "This is post method";
		$result=[];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			if(isset($data['bid_id'])){
				$userId = $this->Auth->user('id');
				$jobs = $this->Jobs->find('all')->contain(['Bids','BidImages'])->where(['Jobs.id'=>$data['bid_id']])->first();
				$result = [];
				foreach ($jobs as $key => $value) {
					$result[]=$value;
				}
				$error_code = 0;
				$error_message="Successfully";
			}else{
				$error_message = 'Please enter required field.';
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}


}
