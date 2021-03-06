<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;

/**
 * Articles Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
  public function initialize(array $config)
  {
    parent::initialize($config);

    $this->setTable('articles');
    $this->setDisplayField('title');
    $this->setPrimaryKey('id');

//    $this->addBehavior('Timestamp');
    $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'always',
        ],
        'Users.completed' => [
          'Users.modified' => 'always'
        ]
      ]
    ]);
    $this->addBehavior('Translate', ['fields' => ['title'], 'validator' => 'translated']);

    $this->belongsTo('Users', [
        'foreignKey' => 'user_id',
        'joinType' => 'INNER'
    ]);

//    $this->addBehavior('CounterCache', ['Users' => ['articles_count']]);
    $this->addBehavior('CounterCache', ['Users' => [
        'articles_count' => [
          'conditions' => ['Articles.isdelete' => false]
        ]
      ]
    ]);
  }

  public function validationTranslated (Validator $validator)
  {
    $validator->scalar('title')
      ->requirePresence('title', 'create')
      ->notEmpty('title');

    $validator->scalar('content')
      ->requirePresence('content', 'create')
      ->notEmpty('content');

    return $validator;
  }

  public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
  {
    foreach ($data as $key => $value) {
      if (is_string($value)) {
        $data[$key] = trim($value);
      }
    }
  }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
      $validator->integer('id')
                ->allowEmpty('id', 'create');

      $validator->integer('user_id')
                ->requirePresence('user_id', 'create')
                ->notEmpty('user_id');

      $validator->scalar('title')
                ->requirePresence('title', 'create')
                ->notEmpty('title');

      $validator->scalar('content')
                ->requirePresence('content', 'create')
                ->notEmpty('content');

      return $validator;
    }

  /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
      $rules->add($rules->existsIn(['user_id'], 'Users'));
      return $rules;
    }
}
