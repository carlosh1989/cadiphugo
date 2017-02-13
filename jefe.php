<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');

use DB\Eloquent;
use Models\Comercio;
use Models\Jefe;

new Eloquent();
//\krumo::dump($comercios);

extract($_POST);

$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',5)->where('cod_parroquia',20)->where('bodega',92)->limit(10)->get();

//\krumo::dump($solos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jefes</title>
</head>
<body>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre Apellido</th>
        <th>Cedula</th>
        <th>fecha nacimiento</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Cant. Personas</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($jefes as $jefe): ?>
		<tr>
			<td><?php echo $jefe->nombre_apellido ?></td>
			<td><?php echo $jefe->cedula ?></td>
			<td><?php echo $jefe->fecha_nacimiento ?></td>
			<td><?php echo $jefe->edad ?></td>
			<td>
			<?php 
			if($jefe->sexo == '2')
			{
				echo "Masculino";
			}
			else
			{
				echo "Fmenino";
			}
			?>
			</td>
			<td align="center"><?php echo $jefe->n_personas ?></td>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>
</body>
</html>