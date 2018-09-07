<h2>Editar datos de un policía</h2>

<?php
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */
echo $this->Form->create($police);

echo $this->Form->control('dni');
echo $this->Form->control('carnet');
echo $this->Form->control('category_id', ['options' => $categories]);
//echo $this->Form->control('category_id');
echo $this->Form->control('nombre');
echo $this->Form->control('apellido1');
echo $this->Form->control('apellido2');
echo $this->Form->button('Guardar');
echo $this->Form->end();
?>