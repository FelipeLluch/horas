<h2>Listado de policías de su grupo</h2>
<h2>Si desea modificar las horas de un policía pulse sobre ellas</h2>

<?=
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */
$this->Html->link('Agregar policía',['action' => 'add']) ?>

<table>
        <thead>
        <tr>
            <th>DNI</th>
            <th>Carnet Profesional</th>
            <th>Categoría</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Horas</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
<?php foreach ($polices as $police): ?>
    <tr>
        <td>
            <?= $police->dni ?>
        </td>
        <td>
            <?= $police->carnet ?>
        </td>
        <td>
            <?= $police->category->title ?>
        </td>
        <td>
            <?= $police->nombre ?>
        </td>
        <td>
            <?= $police->apellido1 ?>
        </td>
        <td>
            <?= $police->apellido2 ?>
        </td>
        <td>
            <?= $this->Html->link($police->horas,['action'=>'view' , $police->slug]) ?>
        </td>
        <td>
            <?= $this->Html->link('Editar', ['action' => 'edit', $police->slug]) ?>
            <?= $this->Form->postLink(
                'Eliminar',
                ['action' => 'delete', $police->slug],
                ['confirm' => 'Desea eliminar al policia con carnet ' . $police->carnet . '?'])
            ?>
        </td>
    </tr>
<?php endforeach; ?>
        </tbody>
</table>