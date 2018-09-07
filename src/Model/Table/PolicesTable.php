<?php
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class PolicesTable extends Table
{
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $slug = Text::slug($entity->dni);
            $entity->slug = substr($slug, 0, 191);
        }
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('category_id')
            ->notEmpty('dni')
            ->integer('dni')
            ->add('dni', 'validDni', ['rule' => ['range', 1, 99999999] , 'message' => 'Número demasiado alto'])
            ->notEmpty('carnet')
            ->integer('carnet')
            ->add('carnet', 'validCarnet', ['rule' => ['range', 1, 999999] , 'message' => 'Número demasiado alto'])
            ->notEmpty('nombre')
            ->notEmpty('apellido1')
            ->notEmpty('apellido2')
            ->notEmpty('horas')
            ->add('horas','validHoras' , ['rule' => 'numeric' , 'message' => 'Número no válido']);

        return $validator;
    }
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories');

    }
}