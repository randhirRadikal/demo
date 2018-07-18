<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class ApisController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    public function getData()
    {
      if ($this->request->is('post')) {
          $data = $this->request->data;
          pr($data); exit;
          $packagesTable = TableRegistry::get('Packages');
          $package=$packagesTable->Find('all')->where(['id'=>$package_id])->first();
    }
}
