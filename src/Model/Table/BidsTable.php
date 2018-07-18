<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BidsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('bids');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
		$this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
		$this->belongsTo('Users', [
            'foreignKey' => 'created_by'
        ]);
		$this->hasOne('Payments', [
            'foreignKey' => 'bid_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        return $validator;
    }




}
