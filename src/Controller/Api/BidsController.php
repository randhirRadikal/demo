<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class BidsController extends AppController
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
			$required['bid_id'] = isset($data['bid_id'])?$data['bid_id']:'';
			$required['type'] = isset($data['type'])?$data['type']:'';
			$required['phone_number'] = isset($data['phone_number'])?$data['phone_number']:'';
			$required['amount'] = isset($data['amount'])?$data['amount']:'';
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

	public function demo(){

	}


}
