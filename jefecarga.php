<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');

use DB\Eloquent;
use Models\Comercio;
use Models\Jefe;

new Eloquent();
//\krumo::dump($comercios);

extract($_POST);

$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'DESC')->get();

//\krumo::dump($solos);
?>
<table>
    <thead>
      <tr>
        <th>Nombre Apellido</th>
        <th>Cedula</th>
        <th>Parentesco</th>
        <th>Edad</th>
        <th>fecha nac.</th>
        <th>DISCAPACIDAD</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($jefes as $jefe): ?>
        <tr style="background-color:#73C5FF;">
			<td align="left"><?php echo $jefe->nombre_apellido ?></td>
			<td align="center"><?php echo $jefe->cedula ?></td>
			<td align="center">Jefe Familia</td>
			<td align="center"><?php echo $jefe->edad ?></td>
			<td align="center"><?php echo $jefe->fecha_nacimiento ?></td>
			<td align="center">NINGUNA</td>
      	</tr>

      	<?php foreach ($jefe->familia as $familiar): ?>
        <tr class="bordered">
			<td align="left"><?php echo $familiar->nombre_y_apellido ?></td>
			<td align="center"><?php echo $familiar->cedula ?></td>
			<td align="center">
			<?php if ($familiar->parentesco=='1'): ?>
				<?php echo 'Hijo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='2'): ?>
				<?php echo 'Esposo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='3'): ?>
				<?php echo 'Padre' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='4'): ?>
				<?php echo 'Madre' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='5'): ?>
				<?php echo 'Hermano(a)' ?>
			<?php endif ?>
			</td>
			<td align="center"><?php echo $familiar->edad ?></td>
			<td align="center"><?php echo $familiar->fecha_nacimiento ?></td>
			<td align="center"><?php echo $familiar->discapacidad ?></td>
      	</tr>
      	<?php endforeach ?>
		<?php endforeach ?>
    </tbody>
  </table>