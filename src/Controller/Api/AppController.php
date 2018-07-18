<?php
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Firebase\JWT\JWT;
use Cake\Routing\Router;

class AppController extends Controller
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email'
                    ]
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'fields' => [
                        'username' => 'email'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => true,
        ]);
    }


    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

		public function __require_fields($required){
        $empty_fields = [];
        foreach($required as $key=>$val){
            if($val == ''){
                $empty_fields[$key] = $val;
            }
        }
        return $empty_fields;
    }

		public function getSiteUrl(){
      $url = Router::url('/', TRUE);
      return $url;
    }

		function sent_email($to=array(),$data=array()){
        $sender='ITIS4RENT';
        $CakeEmail = new Email('default');
        $from = 'randhirjha2212@gmail.com';
        $CakeEmail->template($data['template_name'], 'default')
                    ->emailFormat('html')
                    ->to($to)
                    ->from([$from => $sender])
                    ->subject($data['subject'])
                    ->viewVars(compact('data'));
            if (@$CakeEmail->send()) {
                return true;
            }
        return false;
    }



}
