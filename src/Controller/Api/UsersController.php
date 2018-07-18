<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{
	public function initialize(){
        parent::initialize();
		$this->Auth->allow(['login','register','forgotPassword']);
    }

	public function login(){
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
			if(isset($data['email']) && isset($data['password'])){
				$user = $this->Auth->identify();
	            if ($user) {
	                $this->Auth->setUser($user);
					$this->set([
			          'error_code'=>0,
			          'error_message'=>'Login successfully',
			          'data'=>[
			            'token'=>  JWT::encode([
			              'sub'=>$user['email'],
			              'exp'=>time()+604800
			            ],  Security::salt()),
			            'name'=>$user['name'],
			            'email'=>$user['email']
			          ],
			          '_serialize'=>['error_code','error_message','data']
			        ]);
	            }
	            else {
					$this->set(["error_code"=>1,
			                                    "error_message"=>"Please enter valied email and password.",
			                                    '_serialize' => ['error_code','error_message']]);
	            }
			}else{
				$error_message = "Please enter required field.";
				$this->set(["error_code"=>$error_code,
		                                    "error_message"=>$error_message,
		                                    '_serialize' => ['error_code','error_message']]);
			}
        }else{
			$this->set(["error_code"=>$error_code,
	                                    "error_message"=>$error_message,
	                                    '_serialize' => ['error_code','error_message']]);
		}

	}

	public function register(){
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

	public function forgotPassword(){
		pr($this->Auth->user());
		exit;
	}


	public function updateUser(){
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['id'] = $this->Auth->user('id');
			$required['name'] = isset($data['name'])?$data['name']:'';
			$required['phone_number'] = isset($data['phone_number'])?$data['phone_number']:'';
			$required['username'] = isset($data['username'])?$data['username']:'';
			$blank_field = $this->__require_fields($required);
		    if (count($blank_field)>0){
		        $error_message = 'Please enter required field.';
		    }else{
				$user = $this->Users->get($required['id']);
				$user = $this->Users->patchEntity($user, $required);
				if ($this->Users->save($user)) {
					$error_code = 0;
					$error_message = 'Successfully registered.';
				} else {
				  $error_message = "The user could not be saved, Please, try again.";
				}
			}
		}
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					'_serialize' => ['error_code','error_message']]);
	}

	public function userDetails(){
		$error_code =0;
		$error_message = "Successfully";
		$userId = $this->Auth->user('id');
		$result = $this->Users->find('all')->where(['id'=>$userId])->first();
		$this->set(["error_code"=>$error_code,
					"error_message"=>$error_message,
					"result"=>$result,
					'_serialize' => ['error_code','error_message','result']]);
	}
}
