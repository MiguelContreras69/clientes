<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Mails', [
        'foreignKey' => 'cliente_id'
        ]);
        
        $this->hasMany('Telefonos', [
        'foreignKey' => 'cliente_id'
        ]);
        
        $this->hasMany('Domicilios', [
        'foreignKey' => 'cliente_id'
        ]);
        // $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     * 
     * realiza las validaciones antes de haer cambios en la base de datos
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre', 'Escriba un nombre antes de continuar');
        $validator
            ->requirePresence('apellidoPaterno', 'create')
            ->notEmpty('apellidoPaterno', 'Escriba su apellido paterno nombre antes de continuar');
        $validator
            ->requirePresence('apellidoMaterno', 'create')
            ->notEmpty('apellidoMaterno', 'Escriba su apellido materno nombre antes de continuar');

        $validator
            ->requirePresence('alias', 'create')
            ->notEmpty('alias', 'Escriba un alias antes de continuar')
            ->add('alias', 'unique', [
                'rule' => 'validateUnique', 
                'provider' => 'table',
                'message' => 'El alias ya se encuentra registrado, se debe introducir un alias diferente.'
            ]) ;

        $validator
            ->requirePresence('fechaNacimiento', 'create')
            ->notEmpty('fechaNacimiento', 'Debe introducir su fecha de nacimiento');

        /*$validator
            ->integer('status')
            ->allowEmpty('status');*/

        /*$validator
            ->integer('notificaciones')
            ->allowEmpty('notificaciones');*/

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
        $rules->add($rules->isUnique(['alias'])); 
        return $rules;
    }
}
