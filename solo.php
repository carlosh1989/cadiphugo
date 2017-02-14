<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Jefe;
new Eloquent();
extract($_POST);
$solos = Jefe::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
?>
<table>
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
			<td align="left"><?php echo $solo->nombre_apellido ?></td>
			<td align="center"><?php echo $solo->cedula ?></td>
			<td align="center"><?php echo $solo->fecha_nacimiento ?></td>
			<td align="center"><?php echo $solo->edad ?></td>
			<td align="center">
			<?php 
			if($solo->sexo == '2')
			{
				echo "Masculino";
			}
			else
			{
				echo "Femenino";
			}
			?>
			</td>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>
  <hr>
  <pre>Total personas solas: <?php echo $solos->count() ?></pre>
