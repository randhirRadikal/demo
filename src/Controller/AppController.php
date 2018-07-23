<?php
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
					'userModel' => 'Admins',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Jobs',
                'action' => 'newPosts'
            ],
            'logoutRedirect' => [
                'controller' => 'Admins',
                'action' => 'login'
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {

    }
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized()
    {
        $user = $this->Auth->user('id');
        if(!empty($user)){
            return true;
        }
        return false;
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

    public function __upload_file($pic,$target_path) {
        if ($pic['type'] == 'image/jpeg' || $pic['type'] == 'image/png' || $pic['type']== 'image/gif') {
            $ext = explode('.', $pic['name']);
            $l_name = $ext[0].'_'.uniqid(time()).".".end($ext);
            $path = WWW_ROOT . "img" . DS . $target_path;
            if (move_uploaded_file($pic['tmp_name'], $path . DS . $l_name)) {
                return $l_name;
            }
        }
        return FALSE;
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

	public function __upload_any_file($pic,$target_path) {
		//$ext = explode('.', $pic['name']);
		//$l_name = uniqid(time()).$this->generateRandomString(). "." . end($ext);
		$path = WWW_ROOT . "files" . DS . $target_path;
		//pr($pic);
		//pr($target_path);
		if (move_uploaded_file($pic['tmp_name'], $path . DS . $pic['name'])) {
		//	echo "sdf";
		}else{
			//echo "sdfsd";
		}
		//exit;
    }
}
