<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

		$this->hasMany('Jobs', [
            'foreignKey' => 'user_id',
			'joinType' => 'INNER'
        ]);

		$this->hasMany('Bids', [
            'foreignKey' => 'created_by',
			'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('profile_pic');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function emailCheck($email){
      $query = $this->find('all',[
          'conditions' => ['Users.email =' => $email]
      ]);
      return $query->count();
    }

    public function updateFcmToken($userId,$fcmToken){
      $query = $this->query();
        $query->update()
          ->set(['fcm_token' => $fcmToken])
          ->where(['id' => $userId])
          ->execute();
      return true;
    }


}
