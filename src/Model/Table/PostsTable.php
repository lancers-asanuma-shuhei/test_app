<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->hasMany('Comments');
  }

  public function validationDefault(validator $validator)
  {
    $validator
      ->notEmpty('body')
      ->requirePresence('body')
      ->add('body', [
        'length' => [
          'rule' => ['minLength', 3],
          'message' => '3文字以上入力して'
        ]
      ]);
    return $validator;
  }
}
