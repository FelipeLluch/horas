<h2>Gestión de horas de un policía</h2>

<table>
    <thead>
    <tr>
        <th>DNI</th>
        <th>Carnet Profesional</th>
        <th>Categoría</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>


    </tr>
    </thead>
    <tbody>
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
    </tr>
    </tbody>
</table>

<?php
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */
echo $this->Form->create($police);
echo $this->Form->control('horas');
echo $this->Form->button('Guardar');
echo $this->Form->end();
?>
