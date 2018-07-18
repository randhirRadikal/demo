<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class SitesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('changePassword');
        $this->viewBuilder()->layout('login');
    }
    public function changePassword()
    {
  		$Users =[];
  		$menu = ["menu"=>"homeowner","menu_type"=>"manpower"];
  		$this->set(compact('Users','menu'));
        $this->set('_serialize', ['Users','menu']);
    }


}
