<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\I18n\Time;

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
			if(isset($data['email']) && isset($data['password']) && isset($data['type'])){
				$user = $this->Auth->identify();
				if ($user) {
				    if($data['type'] == 1){
				        $data['type'] = "Contractor";
				    }else if($data['type']){
				        $data['type'] = "Owner";
				    }
					if($user['type'] == $data['type']){
						if(isset($data['fcm_token'])){
							$this->Users->updateFcmToken($user['id'],$data['fcm_token']);
						}
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
								'email'=>$user['email'],
								"user"=>$user
							],
							'_serialize'=>['error_code','error_message','data']
						]);
					}else{
						$this->set(["error_code"=>1,
						"error_message"=>"Please enter valied email and password.",
						'_serialize' => ['error_code','error_message']]);
					}
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
			$required['phone_number'] = isset($data['mobile'])?$data['mobile']:'';
			$required['address'] = isset($data['thoroughfare'])?$data['thoroughfare']:'';
			$required['city'] = isset($data['locality'])?$data['locality']:'';
			$required['state'] = isset($data['administrativeArea'])?$data['administrativeArea']:'';
			$required['pincode'] = isset($data['postalCode'])?$data['postalCode']:'';
			$required['country'] = isset($data['countryName'])?$data['countryName']:'';
			$blank_field = $this->__require_fields($required);
			if (count($blank_field)>0){
				$error_message = 'Please enter required field.';
			}else{
				if($this->Users->emailCheck($data['email']) == 0){
					if($required['type'] == 1){
						$required['type'] = "Contractor";
					}else if($required['type'] == 2){
						$required['type'] = "Owner";
					}
					$user = $this->Users->newEntity();
					$user = $this->Users->patchEntity($user, $required);
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
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['email'] = isset($data['email'])?$data['email']:'';
			$required['type'] = isset($data['type'])?$data['type']:'';
			$blank_field = $this->__require_fields($required);
			if (count($blank_field)>0){
				$error_message = 'Please enter required field.';
			}else{
				$user = $this->Users->find('all')->where(['email'=>$data['email']])->first();
				if($user){
					$user->verification_code= md5(Time::now().'-'.$user->email);
					$this->Users->save($user);
					$to = $user->email;
                      $mail_content['template_name'] = 'account_forgot_password';
                      $mail_content['subject'] = 'Randhir - Reset password';
                      $mail_content['first_name'] = $user->name;
                      $mail_content['reset_password_link'] = $this->getSiteUrl() ."change_password/".$user->verification_code;
                      $this->sent_email($to, $mail_content);
					$error_code = 0;
					$error_message = "Please check your mail";
				}else{
					$error_message = "Email ID not found";
				}
			}
		}
		$this->set(["error_code"=>$error_code,
		"error_message"=>$error_message,
		'_serialize' => ['error_code','error_message']]);
	}


	public function updateUser(){
		$error_code = 1;
		$error_message = "This is post method";
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data;
			$required['id'] = $this->Auth->user('id');
			$required['name'] = isset($data['name'])?$data['name']:'';
			$required['phone_number'] = isset($data['phone_number'])?$data['phone_number']:'';
			$required['address'] = isset($data['address'])?$data['address']:'';
			$required['city'] = isset($data['city'])?$data['city']:'';
			$required['state'] = isset($data['state'])?$data['state']:'';
			$required['pincode'] = isset($data['pincode'])?$data['pincode']:'';
			$blank_field = $this->__require_fields($required);
			if (count($blank_field)>0){
				$error_message = 'Please enter required field.';
			}else{
				$user = $this->Users->get($required['id']);
				if(isset($data['image'])){
					$arr = explode(',',$data['image']);
					$required['profile_pic'] = md5($data['job_id'].time().uniqid()).".png";
					$decode = base64_decode($arr[1]);
					file_put_contents("img/users/".$required['profile_pic'],$decode);
				}
				$user = $this->Users->patchEntity($user, $required);
				if ($this->Users->save($user)) {
					$error_code = 0;
					$error_message = 'Successfully updated.';
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
