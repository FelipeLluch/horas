<?php
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */

namespace App\Model\Table;
use Cake\ORM\Table;

class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
        //parent::initialize($config);

        $this->hasMany('Polices');
    }
}