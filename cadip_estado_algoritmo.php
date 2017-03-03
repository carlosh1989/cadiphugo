<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Clap2;
use Models\Clap;
use Models\Familia;
use Models\Jefe;
new Eloquent();

$claps = Clap::all();

foreach ($claps as $clap) 
{
	echo "\n";
	echo "---------------------------------------------------------------------\n";
	echo "\033[32m NOMBRE CLAP \033[0m: -> ".$clap->nombre_clap." \n";
	//comenzar a buscar por miembro de clap uno por uno
	echo "---------------------------------------------------------------------\n";
	//lider de comunidad
	if($clap->l_com_cedula)
	{
		echo "LIDER COMUNIDAD: ".$clap->nombre_comunidad." -> ";

		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_com_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_com_cedula)->first();

		$clap_verificar = Clap2::where('cedula', $clap->l_com_cedula)->first();

		if($clap_verificar)
		{
			echo "\033[32m ".$clap_verificar->estatus." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clap2 = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'LIDER DE COMUNIDAD',
				'tipo'        	 => $clap->tipo_comunidad,
				'cedula'      	 => $clap->l_com_cedula,
				'nombre_apellido'=> $clap->nombre_comunidad,
				'telefono'       => $clap->l_com_telefono,
				'estatus'        => '',
			]);

			$clap = Clap2::find($clap2->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clap->estatus = 'registrado';
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clap->estatus = 'registrado';
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clap->estatus = 'no registrado';
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}


		$clap->save();

		echo "\n";
		echo "\n";
	}

	//ubch
	if ($clap->l_ubch_cedula) 
	{
		echo "UBCH: ".$clap->nombre_ubch." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_ubch_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_ubch_cedula)->first();

		//verificando si lo encontro tanto como jefe o como carga familiar
		if($jefe) 
		{
			echo "\033[32m es jefe de familia \033[0m";
		}
		else
		{
			if($familiar) 
			{
				echo "\033[32m es carga familiar \033[0m";
			}
			else
			{
				echo "\033[32m No se encuentra registrado \033[0m";
			}
		}


		echo "\n";
		echo "\n";
	}

	//una mujer
	if($clap->l_unamujer_cedula)
	{
		echo "UNA MUJER: ".$clap->nombre_unamujer." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_unamujer_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_unamujer_cedula)->first();

		//verificando si lo encontro tanto como jefe o como carga familiar
		if($jefe) 
		{
			echo "\033[32m es jefe de familia \033[0m";
		}
		else
		{
			if($familiar) 
			{
				echo "\033[32m es carga familiar \033[0m";
			}
			else
			{
				echo "\033[32m No se encuentra registrado \033[0m";
			}
		}


		echo "\n";
		echo "\n";
	}

	//Lider FFM
	if($clap->l_ffm_cedula)
	{
		echo "LIDER FFM: ".$clap->nombre_unamujer." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_ffm_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_ffm_cedula)->first();

		//verificando si lo encontro tanto como jefe o como carga familiar
		if($jefe) 
		{
			echo "\033[32m es jefe de familia \033[0m";
		}
		else
		{
			if($familiar) 
			{
				echo "\033[32m es carga familiar \033[0m";
			}
			else
			{
				echo "\033[32m No se encuentra registrado \033[0m";
			}
		}


		echo "\n";
		echo "\n";
	}

	//l_ccomunal
	if($clap->l_ccomunal_cedula)
	{
		echo "LIDER CONSEJO COMUNAL: ".$clap->nombre_ccomunal." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_ccomunal_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_ccomunal_cedula)->first();

		//verificando si lo encontro tanto como jefe o como carga familiar
		if($jefe) 
		{
			echo "\033[32m es jefe de familia \033[0m";
		}
		else
		{
			if($familiar) 
			{
				echo "\033[32m es carga familiar \033[0m";
			}
			else
			{
				echo "\033[32m No se encuentra registrado \033[0m";
			}
		}

		echo "\n";
		echo "\n";
	}

	//Lider Milicia
	if($clap->l_milicia_cedula)
	{
		echo "MILICIA: ".$clap->nombre_milicia." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_ccomunal_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_ccomunal_cedula)->first();

		//verificando si lo encontro tanto como jefe o como carga familiar
		if($jefe) 
		{
			echo "\033[32m es jefe de familia \033[0m";
		}
		else
		{
			if($familiar) 
			{
				echo "\033[32m es carga familiar \033[0m";
			}
			else
			{
				echo "\033[32m No se encuentra registrado \033[0m";
			}
		}

		echo "\n";	
	}
	echo "---------------------------------------------------------------------\n";
	echo "\n";
}

