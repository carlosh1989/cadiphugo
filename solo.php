<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');

use DB\Eloquent;
use Models\Comercio;
use Models\Jefe;

new Eloquent();
//\krumo::dump($comercios);

extract($_POST);

$solos = Jefe::where('n_personas',1)->where('cod_municipio',5)->where('cod_parroquia',20)->where('bodega',92)->limit(10)->get();

//\krumo::dump($solos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solos</title>
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
      </tr>
    </thead>
    <tbody>
		<?php foreach ($solos as $solo): ?>
		<tr>
			<td><?php echo $solo->nombre_apellido ?></td>
			<td><?php echo $solo->cedula ?></td>
			<td><?php echo $solo->fecha_nacimiento ?></td>
			<td><?php echo $solo->edad ?></td>
			<td>
			<?php 
			if($solo->sexo == '2')
			{
				echo "Masculino";
			}
			else
			{
				echo "Fmenino";
			}
			?>
			</td>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>
</body>
</html>