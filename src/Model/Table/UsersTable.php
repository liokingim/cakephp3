<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DigestAuthenticate;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\Event\Event;
use ArrayObject;
use function debug;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

    $this->setTable('users');
    $this->setDisplayField('name');
    $this->setPrimaryKey('id');

//      $this->addBehavior('Timestamp');
    $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'created' => 'new',
          'modified' => 'existing'
        ]
      ]
    ]);
  }

  public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
  {
    foreach ($data as $key => $value) {
      if (is_string($value)) {
        $data[$key] = trim($value);
      }
    }
  }

/*  public function beforeSave(Event $event)
  {
    $entity = $event->getData('entity');
    if ($entity->isNew()) {
      $hasher = new DefaultPasswordHasher();
      $entity->api_key_plain = sha1(Text::uuid());
      $entity->api_key = $hasher->hash($entity->api_key_plain);
    }
    return true;
  }*/

/*  public function beforeSave(Event $event)
  {
    $entity = $event->getData('entity');
    $entity->digest_hash = DigestAuthenticate::password(
      $entity->username,
      $entity->plain_password,
      env('SERVER_NAME')
    );
    return true;
  }*/

  /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
  public function validationDefault(Validator $validator)
  {
    $validator
      ->integer('id')
      ->allowEmpty('id', 'create');

    $validator
      ->email('email')
      ->requirePresence('email', 'create')
      ->notEmpty('email', "이메일이 비어있습니다.");

    $validator
      ->scalar('name')
      ->requirePresence('name', 'create')
      ->notEmpty('name', "이름이 비어있습니다.");

    $validator
      ->scalar('password')
      ->requirePresence('password', 'create')
      ->notEmpty('password', "비밀번호가 비어있습니다.")
      ->add('password', ['length' => ['rule' => ['minLength', 6],
        'message' => '비밀번호는 6자 이상을 적어주세요.']]);

    $validator
      ->scalar('password_confirm')
      ->requirePresence('password_confirm', 'create')
      ->notEmpty('password_confirm', "비밀번호 확인이 비어있습니다.")
      ->add('password_confirm', ['length' => ['rule' => ['minLength', 6],
        'message' => '비밀번호는 6자 이상을 적어주세요.']])
      ->sameAs('password', 'password_confirm', '비밀번호와 비밀번호 확인이 다릅니다.');

    $validator
      ->scalar('phone')
      ->allowEmpty('phone');

    $validator
      ->boolean('status')
      ->allowEmpty('status');

    $validator
      ->add('role', 'inList', ['rule' => ['inList', ['admin', 'staff']],
                                            'message' => 'role을 선택하여 주세요.']);

    return $validator;
  }

  public function validationEditUser(Validator $validator)
  {
    $validator
      ->integer('id')
      ->allowEmpty('id', 'create');

    $validator
      ->email('email')
      ->requirePresence('email', 'create')
      ->notEmpty('email', "이메일이 비어있습니다.");

    $validator
      ->scalar('name')
      ->requirePresence('name', 'create')
      ->notEmpty('name', "이름이 비어있습니다.");

    $validator
      ->scalar('password')
      ->requirePresence('password', 'create')
      ->notEmpty('password', "새로운 비밀번호가 비어있습니다.")
      ->add('password', ['length' => ['rule' => ['minLength', 6],
        'message' => '비밀번호는 6자 이상을 적어주세요.']]);

    $validator
      ->scalar('phone')
      ->allowEmpty('phone');

    $validator
      ->boolean('status')
      ->allowEmpty('status');

    $validator
      ->add('role', 'inList', ['rule' => ['inList', ['admin', 'staff']],
                                            'message' => 'role을 선택하여 주세요.']);

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
    $rules->add($rules->isUnique(['email'], "이미 이메일이 존재합니다."));

    return $rules;
  }
}
