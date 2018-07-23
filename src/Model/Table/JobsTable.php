<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class JobsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('jobs');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
		$this->hasMany('Bids', [
            'foreignKey' => 'job_id'
        ]);
		$this->hasMany('JobImages', [
            'foreignKey' => 'job_id'
        ]);
		$this->hasMany('JobMessages', [
            'foreignKey' => 'job_id'
        ]);
		$this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
		$this->hasOne('Reviews', [
            'foreignKey' => 'job_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        return $validator;
    }




}
