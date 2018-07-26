<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class JobsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('');
    }
    public function index()
    {
        $users = $this->paginate($this->Jobs);
		$menu = ["menu"=>"cancelled_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
        $this->set(compact('users','menu'));
        $this->set('_serialize', ['users','menu']);
    }

    public function newPosts($id = null)
    {
		$Jobs = [];
		if ($this->request->is(['patch', 'post', 'put'])) {

		}else{
			$JobTemp = $this->Jobs->find('all')
				->where(['Jobs.status'=>'Pending'])
				->contain(['Bids','Users'])
				->toArray();

			foreach ($JobTemp as $key => $value) {
				if(count($value['bids'])==0){
					array_push($Jobs,$value);
				}
			}
		}
		$menu = ["menu"=>"newposted_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','menu'));
        $this->set('_serialize', ['Jobs','menu']);
    }

	public function jobYet(){
        $JobTemp = $this->Jobs->find('all')
			->where(['Jobs.status'=>'Pending'])
			->contain(['Bids','Users'])
			->toArray();
		$Jobs = [];
		foreach ($JobTemp as $key => $value) {
			if(count($value['bids'])){
				array_push($Jobs,$value);
			}
		}
		$menu = ["menu"=>"jobyet_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','menu'));
        $this->set('_serialize', ['Jobs','menu']);
    }

	public function bidsDetails($jobId = null){
		$reviewsTable = TableRegistry::get('Reviews');
		$Jobs = $this->Jobs->find('all')
			->where(['Jobs.id'=>$jobId])
			->contain(['Bids'=>['Users']])
			->first();
		$lowestBid = false;
		$lowestBidValue = false;
		$Bids = [];
		foreach ($Jobs['bids'] as $key => $value) {
			if($lowestBid){
				if($lowestBid > $value['amount']){
					$lowestBid = $value['amount'];
					$lowestBidValue = $value;
				}
			}else{
				$lowestBid = $value['amount'];
				$lowestBidValue = $value;
			}
		}
		$Bids['details'] = $lowestBidValue;
		$Bids['reviews'] = $reviewsTable->find('all')->where(['created_for'=>$lowestBidValue['created_by']])->toArray();
		$Bids['lastJob'] = $this->Jobs->find('all')->contain(['Bids'])->order(['Jobs.id'=>'DESC'])->first();
		// pr($lowestBidValue);
		// exit;
		$menu = ["menu"=>"jobyet_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','Bids','menu'));
        $this->set('_serialize', ['Jobs','Bids','menu']);
	}

	public function pending($id = null){
        $Jobs = $this->Jobs->find('all')
			->select(['Jobs.id','Jobs.status','Jobs.created','Jobs.title','Jobs.budget','Jobs.type','Jobs.user_id','Users.name','Users.company_name'])
			->where(['Jobs.status'=>'Started'])
			->contain(['Bids' => [
				'fields' => [
					'Bids.id',
					'Bids.created_by',
					'Bids.job_id',
					'Bids.amount',
					'Bids.status'
				],
				'conditions' =>[
					'Bids.status'=>'Approved'
				],
				'Users' => [
					'fields' => [
						'Users.id',
						'Users.name','Users.company_name'
					]
				]
			],'Users'])
			->toArray();
		$menu = ["menu"=>"pending_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','menu'));
        $this->set('_serialize', ['Jobs','menu']);
    }

	public function completed($id = null)
    {
		$Jobs = $this->Jobs->find('all')
			->select(['Jobs.id','Jobs.status','Jobs.created','Jobs.completed_date','Jobs.title','Jobs.budget','Jobs.type','Jobs.user_id','Users.name','Users.company_name'])
			->where(['Jobs.status'=>'Completed'])
			->contain(['Bids' => [
				'fields' => [
					'Bids.id',
					'Bids.created_by',
					'Bids.job_id',
					'Bids.amount',
					'Bids.status'
				],
				'conditions' =>[
					'Bids.status'=>'Approved'
				],
				'Users' => [
					'fields' => [
						'Users.id',
						'Users.name',
						'Users.company_name'
					]
				],
				'Payments' => [
					'fields' => [
						'Payments.id',
						'Payments.amount'
					]
				]
			],'Users'])
			->toArray();
		// pr($Jobs);
		// exit;

		$menu = ["menu"=>"compaleted_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','menu'));
        $this->set('_serialize', ['Jobs','menu']);
    }

	public function cancelled($id = null)
    {
		$Jobs = $this->Jobs->find('all')->where(['Jobs.status'=>'Cancelled'])->contain(['Bids'=>['Users'],'Users'])->toArray();


		$menu = ["menu"=>"cancelled_jobs","menu_type"=>"job","admin"=>$this->Auth->user()];
		$this->set(compact('Jobs','menu'));
        $this->set('_serialize', ['Jobs','menu']);
    }
}
