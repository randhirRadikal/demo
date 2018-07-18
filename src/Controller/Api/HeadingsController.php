<?php
namespace App\Controller\Api;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class HeadingsController extends AppController
{
    public function index(){
		$data=[];
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			$customersTable = TableRegistry::get('Customers');
			$malesTable = TableRegistry::get('Males');
			$femalesTable = TableRegistry::get('Females');
			$req['device_id'] = isset($req['device_id'])?$req['device_id']:"";
			$req['device_type'] = isset($req['device_type'])?$req['device_type']:"";
			if(!empty($req['device_id']) && ($req['device_type'] =='A' || $req['device_type'] == 'I')){
				$customer = $customersTable->find('all')->where(["device_id"=>$req['device_id']])->first();
				$error_code = 0;
				if($customer){
					$data['males'] = $malesTable->Find('all')->contain(['Types'])->where(["Males.modified > "=>$customer->modified])->toArray();
					$data['females'] = $femalesTable->Find('all')->contain(['Types'])->where(["Females.modified > "=>$customer->modified])->group('icon')->toArray();
					// $customer->modified = Time::now();
					// $customersTable->save($customer);
					if(count($data['males']) ==0 && count($data['females']) ==0){
						$categories= ["error_code"=>2,"data"=>$data,"message"=>"Successfully"];
					}else{
						$categories= ["error_code"=>0,"data"=>$data,"message"=>"Successfully"];
					}
				}else{
					$data['males'] = $malesTable->Find('all')->contain(['Types'])->toArray();
					$data['females'] = $femalesTable->Find('all')->contain(['Types'])->group('icon')->toArray();
					// $items = $customersTable->newEntity();
					// $items = $customersTable->patchEntity($items,$req);
					// $customersTable->save($items);
					if(count($data['males']) ==0 && count($data['females']) ==0){
						$categories= ["error_code"=>2,"data"=>$data,"message"=>"Successfully"];
					}else{
						$categories= ["error_code"=>0,"data"=>$data,"message"=>"Successfully"];
					}
				}
			}else{
				$categories= ["error_code"=>0,"data"=>[],"message"=>"Please send all required filed."];
			}
		}else{
			$categories= ["error_code"=>0,"data"=>[],"message"=>"Please send all required filed."];
		}
        echo json_encode($categories);
        exit;
    }

	public function firstTime(){
		$data=[];
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			$customersTable = TableRegistry::get('Customers');
			$malesTable = TableRegistry::get('Males');
			$femalesTable = TableRegistry::get('Females');
			$req['device_id'] = isset($req['device_id'])?$req['device_id']:"";
			$req['device_type'] = isset($req['device_type'])?$req['device_type']:"";
			if(!empty($req['device_id']) && ($req['device_type'] =='A' || $req['device_type'] == 'I')){
				$customer = $customersTable->find('all')->where(["device_id"=>$req['device_id']])->first();
				if($customer){
					$customersTable->delete($customer);
				}
				/*if($customer){
					$customer->modified = Time::now();
					$customersTable->save($customer);
				}else{
					$items = $customersTable->newEntity();
					$items = $customersTable->patchEntity($items,$req);
					$customersTable->save($items);
				}*/

				$data['males'] = $malesTable->Find('all')->contain(['Types'])->toArray();
				$data['females'] = $femalesTable->Find('all')->contain(['Types'])->group('icon')->toArray();
				$categories= ["error_code"=>0,"data"=>$data,"message"=>"Successfully"];
			}else{
				$categories= ["error_code"=>0,"data"=>[],"message"=>"Please send all required filed."];
			}
		}else{
			$categories= ["error_code"=>0,"data"=>[],"message"=>"Please send all required filed."];
		}
        echo json_encode($categories);
        exit;
    }

	public function fileDownloaded(){
		$data=[];
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			$customersTable = TableRegistry::get('Customers');
			$customer = $customersTable->find('all')->where(["device_id"=>$req['device_id']])->first();
			if($customer){
				$customer->name = $customer->name.'_1';
				$customer->modified = Time::now();
				$customersTable->save($customer);
			}else{
				$items = $customersTable->newEntity();
				$req['modified'] = Time::now();
				$items = $customersTable->patchEntity($items,$req);
				$customersTable->save($items);
			}
		}
        $categories= ["error_code"=>0,"data"=>$data];
        echo json_encode($categories);
        exit;
    }

	public function test(){
		$data=[];
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			$malesTable = TableRegistry::get('Males');
			$femalesTable = TableRegistry::get('Females');
			$data['males'] = $malesTable->Find('all')->contain(['Types'])->toArray();
			$data['females'] = $femalesTable->Find('all')->contain(['Types'])->toArray();
		}
        $categories= ["error_code"=>0,"data"=>$data];
        echo json_encode($categories);
        exit;
    }

	public function getData(){
		$data=[];
		$typesTable = TableRegistry::get('Types');
		$data['females'] = $typesTable->Find('all')->contain(['Females'])->where(["dress_type"=>1])->toArray();
		$data['males'] = $typesTable->Find('all')->contain(['Males'])->where(["dress_type"=>2])->toArray();
        $categories= ["error_code"=>0,"data"=>$data];
        echo json_encode($categories);
        exit;
    }

	public function getWearings(){
		$data=[];
		$errorCode = 0;
		$message = 'Success';
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			if(isset($req['model_type']) && isset($req['body_type']) && isset($req['skin_color']) && isset($req['eye_color'])){
				$typesTable = TableRegistry::get('Types');
				if($req['model_type']=='M'){
					$data = $typesTable->Find('all')->contain(['Males'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]]]])->where(["dress_type"=>2])->toArray();
					//$data = $malesTable->Find('all')->where(["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]])->toArray();
				}else{
					$data = $typesTable->Find('all')->contain(['Females'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]]]])->where(["dress_type"=>1])->toArray();
					//$femalesTable = TableRegistry::get('Females');
					//$data = $femalesTable->Find('all')->where(["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]])->toArray();
				}
			}else{
				$errorCode= 1;
				$message = "Please send all the required fields.";
			}
		}else{
			$errorCode = 1;
			$message = "This is post method.";
		}

        $categories= ["error_code"=>$errorCode,"message"=>$message,"data"=>$data];
        echo json_encode($categories);
        exit;
    }

	public function getWearingsTwo(){
		$data=[];
		$errorCode = 0;
		$message = 'Success';
        if ($this->request->is(['post'])) {
			$req = $this->request->data;
			if(isset($req['model_type']) && isset($req['body_type']) && isset($req['skin_color']) && isset($req['eye_color'])){
				$typesTable = TableRegistry::get('Types');
				if($req['model_type']=='M'){
					$data['full_match'] = $typesTable->Find('all')->contain(['Males'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]]]])->where(["dress_type"=>2])->toArray();
					$data['skin_color'] = $typesTable->Find('all')->contain(['Males'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color !="=>$req["eye_color"]]]])->where(["dress_type"=>2])->toArray();
					$data['body_type'] = $typesTable->Find('all')->contain(['Males'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color !="=>$req["skin_color"],"eye_color !="=>$req["eye_color"]]]])->where(["dress_type"=>2])->toArray();
					//$data = $malesTable->Find('all')->where(["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]])->toArray();
				}else{
					$data['full_match'] = $typesTable->Find('all')->contain(['Females'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]]]])->where(["dress_type"=>1])->toArray();
					$req['in_id'] = [];
					if(count($data['full_match']) > 0){
						foreach ($data['full_match'] as $key => $value) {
							foreach ($value['females'] as $key1 => $value1) {
								array_push($req['in_id'],$value1['icon']);
							}
						}
					}else{
						$req['in_id'] =["AP-000_123456.png"];
					}
					$data['skin_color'] = [];//$typesTable->Find('all')->contain(['Females'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color !="=>$req["eye_color"]]]])->where(["dress_type"=>1])->toArray();
					//$data['body_type'] = $typesTable->Find('all')->contain(['Females'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color !="=>$req["skin_color"],"eye_color !="=>$req["eye_color"]]]],['group'=>'icon'])->where(["dress_type"=>1])->toArray();
					$data['body_type'] = $typesTable->Find('all')
							->contain(['Females' => function (\Cake\ORM\Query $query)  use ($req)  {
								// pr($req);
							    return $query->group('icon')->where(["icon NOT IN"=>$req['in_id'],"body_type"=>$req["body_type"],"skin_color !="=>$req["skin_color"],"eye_color !="=>$req["eye_color"]]);
							}])
							->where(["dress_type"=>1])->toArray();

					// pr($data['body_type']);
					// exit;
					//$data = $typesTable->Find('all')->contain(['Females'=>['conditions'=>["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]]]])->where(["dress_type"=>1])->toArray();
					//$femalesTable = TableRegistry::get('Females');
					//$data = $femalesTable->Find('all')->where(["body_type"=>$req["body_type"],"skin_color"=>$req["skin_color"],"eye_color"=>$req["eye_color"]])->toArray();
				}
			}else{
				$errorCode= 1;
				$message = "Please send all the required fields.";
			}
		}else{
			$errorCode = 1;
			$message = "This is post method.";
		}

        $categories= ["error_code"=>$errorCode,"message"=>$message,"data"=>$data];
        echo json_encode($categories);
        exit;
	}

	public function maleDresses(){
		$data=[];
		if ($this->request->is(['post'])) {
			$req = $this->request->data;
			$typesTable = TableRegistry::get('Types');
			$req['body_type'] = isset($req['body_type'])?$req['body_type']:"";
			if(!empty($req['body_type'])){
				$data = $typesTable->Find('all')->contain(['Males'])->where(["dress_type"=>2])->toArray();
				//$data = $malesTable->Find('all')->contain(['Males'])->where(["body_type "=>$req['body_type']])->toArray();
				$categories= ["error_code"=>0,"data"=>$data,"message"=>"Successfully."];
			}else{
				$categories= ["error_code"=>1,"data"=>[],"message"=>"Please send all required filed."];
			}
		}else{
			$categories= ["error_code"=>1,"data"=>[],"message"=>"Please send all required filed."];
		}
		echo json_encode($categories);
		exit;
	}

	public function testing(){
		$categories= ["error_code"=>"TEST","message"=>"Hello Tamal da."];
		echo json_encode($categories);
		exit;
	}

}
