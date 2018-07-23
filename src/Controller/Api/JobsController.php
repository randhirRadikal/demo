<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Firebase\JWT\JWT;

class JobsController extends AppController
{
	public function initialize(){
        parent::initialize();
		$this->Auth->allow(['']);
    }

	public function index(){

	}

	public function getJobType(){
		$jobTypeTable = TableRegistry::get('JobTypes');
		$result = $jobTypeTable->find('all')->where(['status'=>'Active'])->toArray();
		$error_code = 0;
		$error_message = 'Successfully.';
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function add(){
		$error_code = 1;
		$error_message = "This is post method";
		$result = [];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['job_type_id'] = isset($data['job_type_id'])?$data['job_type_id']:'';
			$required['title'] = isset($data['title'])?$data['title']:'';
			$required['description'] = isset($data['description'])?$data['description']:'';
			$required['budget'] = isset($data['budget'])?$data['budget']:'';
			$required['type'] = isset($data['type'])?$data['type']:'';
			$data['user_id'] = $this->Auth->user('id');
			$blank_field = $this->__require_fields($required);
	    if (count($blank_field)>0){
	        $error_message = 'Please enter required field.';
	    }else{
				$job = $this->Jobs->newEntity();
				$job = $this->Jobs->patchEntity($job, $data);
				$result['job_id'] = $this->Jobs->save($job)->id;
				$error_code = 0;
				$error_message = 'Successfully.';
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function addImages(){
		$error_code = 1;
		$error_message = "This is post method";
		$result = [];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['job_id'] = isset($data['job_id'])?$data['job_id']:'';
			$required['image'] = isset($data['image'])?$data['image']:'';
			$blank_field = $this->__require_fields($required);
	    if (count($blank_field)>0){
	        $error_message = 'Please enter required field.';
	    }else{
				$JobImagesTable = TableRegistry::get('JobImages');
				$JobImages = $JobImagesTable->newEntity();
				$JobImages = $JobImagesTable->patchEntity($JobImages, $data);
				$result = $JobImagesTable->save($JobImages);
				$error_code = 0;
				$error_message = 'Successfully.';
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function finalAdd(){
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['job_id'] = isset($data['job_id'])?$data['job_id']:'';
			$required['urgency'] = isset($data['urgency'])?$data['urgency']:'';
			$required['address'] = isset($data['address'])?$data['address']:'';
			$required['city'] = isset($data['city'])?$data['city']:'';
			$required['state'] = isset($data['state'])?$data['state']:'';
			$required['pincode'] = isset($data['pincode'])?$data['pincode']:'';
			$blank_field = $this->__require_fields($required);
	    if (count($blank_field)>0){
	        $error_message = 'Please enter required field.';
	    }else{
				$job = $this->Jobs->get($data['job_id']);
				$data['status'] = "Pending";
				$job = $this->Jobs->patchEntity($job, $data);
				if($this->Jobs->save($job)){
					$error_code = 0;
					$error_message = 'Successfully.';
				}else{
					 $error_message = "The user could not be saved, Please, try again.";
				}

			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					'_serialize' => ['error_code','error_message']]);
	}

	public function historyJobs(){
		$error_code = 1;
		$error_message = "You are not valied user.";
		$result = [];
		if($this->Auth->user('type') == 'Contractor'){
			$result = $this->Jobs->find('all')
				->where(['Jobs.status'=>'Completed'])
				->contain(['Bids' => function(\Cake\ORM\Query $q) {
			        	return $q->where(['Bids.created_by' => $this->Auth->user('id')]);
			    	}])
				->toArray();
			$error_code = 0;
			$error_message = 'Successfully1.';
		}else if($this->Auth->user('type') == 'Owner'){
			$result = $this->Jobs->find('all')->where(['Jobs.user_id'=>$this->Auth->user('id'),'Jobs.status'=>'Completed'])->toArray();
			$error_code = 0;
			$error_message = 'Successfully2.';
		}else if($this->Auth->user('type') == 'PremiumContractor'){
			$result = $this->Jobs->find('all')->where(['Jobs.user_id'=>$this->Auth->user('id')])->toArray();
			$error_code = 0;
			$error_message = 'Successfully3.';
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function pendingQuotes(){
		$error_code = 0;
		$error_message="Successfully";
		$result = $this->Jobs->find('all')
			->where(['Jobs.status'=>'Pending','Jobs.user_id'=>$this->Auth->user('id')])
			->contain(['Bids' => function($q) {
			    $q->select([
					'Bids.job_id',
			        'totalBids' => $q->func()->count('Bids.job_id')
			    ])
				->group(['Bids.job_id']);
			    return $q;
			}])->toArray();
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function pendingQuotesBids(){
		$error_code = 1;
		$error_message = "This is post method";
		$result = [];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['job_id'] = isset($data['job_id'])?$data['job_id']:'';
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
		        $error_message = 'Please enter required field.';
		    }else{
				$result = $this->Jobs->find('all')
					->select(['Jobs.id', 'Jobs.title'])
					->where(['Jobs.id'=>$data['job_id'],'Jobs.user_id'=>$this->Auth->user('id')])
					->contain([
						'Bids' => [
					        'fields' => [
					            'Bids.id',
					            'Bids.created_by',
					            'Bids.job_id',
								'Bids.amount'
					        ],
					        'Users' => [
					            'fields' => [
					                'Users.id',
					                'Users.name'
					            ]
					        ]
					    ]
					])->first();
				$error_code = 0;
				$error_message="Successfully";
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function pendingQuotesBidProfile(){
		$error_code = 1;
		$error_message = "This is post method";
		$result = [];
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['user_id'] = isset($data['user_id'])?$data['user_id']:'';
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
		        $error_message = 'Please enter required field.';
		    }else{
				$usersTable = TableRegistry::get('Users');
				//$jobsTable = TableRegistry::get('Jobs');
				$result = $usersTable->find('all')
					->select(['Users.id','Users.name'])
					->where(['id'=>$data['user_id']])
					->contain(['Bids'=> function($q) {
					    $q->select([
							'Bids.created_by','Bids.job_id',
					        'totalBids' => $q->func()->count('Bids.created_by')
					    ])
						->group(['Bids.created_by']);
					    return $q;
					}])
					->first();
				$result['job'] = $this->Jobs->find('all')
					->select(['Jobs.id','Jobs.user_id','Jobs.title','Reviews.id','Reviews.description','Reviews.ratting'])
					->where(['Jobs.user_id'=>$result['bids'][0]['created_by']])
					->contain(['Reviews'])
					->order(['Jobs.id'=>'DESC'])
					->first();
				$result['bids'] = $result['bids'][0];
				$error_code = 0;
				$error_message="Successfully";
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}

	public function acceptQuotes(){
		$error_code = 0;
		$error_message="Successfully";
		$result = $this->Jobs->find('all')
			->where(['Jobs.status'=>'Started','Jobs.user_id'=>$this->Auth->user('id')])
			->toArray();
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
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
