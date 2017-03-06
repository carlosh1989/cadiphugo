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

		$clapA = Clap2::where('cedula', $clap->l_com_cedula)->first();

		if($clapA)
		{
			echo "\033[32m ".$clapA->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
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
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapA = Clap2::find($clapAcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapA->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapA->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapA->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}


		$clapA->save();

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

		$clapB = Clap2::where('cedula', $clap->l_ubch_cedula)->first();

		if($clapB)
		{
			echo "\033[32m ".$clapB->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapBcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'UBCH',
				'tipo'        	 => $clap->tipo_ubch,
				'cedula'      	 => $clap->l_ubch_cedula,
				'nombre_apellido'=> $clap->nombre_ubch,
				'telefono'       => $clap->l_ubch_telefono,
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapB = Clap2::find($clapBcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapB->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapB->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapB->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}


		$clapB->save();

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

		$clapC = Clap2::where('cedula', $clap->l_unamujer_cedula)->first();

		if($clapC)
		{
			echo "\033[32m ".$clapC->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapCcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'LIDER UNA MUJER',
				'tipo'        	 => $clap->tipo_unamujer,
				'cedula'      	 => $clap->l_unamujer_cedula,
				'nombre_apellido'=> $clap->nombre_unamujer,
				'telefono'       => $clap->l_unamujer_telefono,
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapC = Clap2::find($clapCcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapC->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapC->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapC->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}


		$clapC->save();

		echo "\n";
		echo "\n";
	}

	//Lider FFM
	if($clap->l_ffm_cedula)
	{
		echo "LIDER FFM: ".$clap->nombre_ffm." -> ";
		//buscando a integrante en tabla de jefes de familia
		$jefe = Jefe::where('cedula',$clap->l_ffm_cedula)->first();
		$familiar = Familia::where('cedula',$clap->l_ffm_cedula)->first();

		$clapD = Clap2::where('cedula', $clap->l_ffm_cedula)->first();

		if($clapD)
		{
			echo "\033[32m ".$clapD->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapDcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'FRENTE FRANCISCO DE MIRANDA',
				'tipo'        	 => $clap->tipo_ffm,
				'cedula'      	 => $clap->l_ffm_cedula,
				'nombre_apellido'=> $clap->nombre_ffm,
				'telefono'       => $clap->l_ffm_telefono,
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapD = Clap2::find($clapDcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapD->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapD->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapD->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}


		$clapD->save();

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

		$clapE = Clap2::where('cedula', $clap->l_ccomunal_cedula)->first();

		if($clapE)
		{
			echo "\033[32m ".$clapE->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapEcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'LIDER COMUNAL',
				'tipo'        	 => $clap->tipo_ccomunal,
				'cedula'      	 => $clap->l_ccomunal_cedula,
				'nombre_apellido'=> $clap->nombre_ccomunal,
				'telefono'       => $clap->l_ccomunal_telefono,
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapE = Clap2::find($clapEcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapE->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapE->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapE->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}

		$clapE->save();

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

		$clapF = Clap2::where('cedula', $clap->l_milicia_cedula)->first();

		if($clapF)
		{
			echo "\033[32m ".$clapF->registrado." \033[0m";
		}
		else
		{
			//Guardando en la tabla a integrante	
			$clapFcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'codigo_clap' 	 => $clap->codigo_clap,
				'nombre_clap' 	 => $clap->nombre_clap, 
				'comunidad'   	 => $clap->comunidad, 
				'cargo'       	 => 'MILICIA',
				'tipo'        	 => $clap->tipo_milicia,
				'cedula'      	 => $clap->l_milicia_cedula,
				'nombre_apellido'=> $clap->nombre_milicia,
				'telefono'       => $clap->l_milicia_telefono,
				'registrado'     => '',
				'ubicado'		 => '',
			]);

			$clapF = Clap2::find($clapFcreate->id);
			//verificando si lo encontro tanto como jefe o como carga familiar
			if($jefe) 
			{
				echo "\033[32m es jefe de familia \033[0m";
				//actualizando el estatus de esa integrante
				$clapF->registrado = 1;
				echo "\033[32m -> esta registrado \033[0m";
			}
			else
			{
				if($familiar) 
				{
					echo "\033[32m es carga familiar \033[0m";
					$clapF->registrado = 1;
					echo "\033[32m -> esta registrado \033[0m";
				}
				else
				{
					echo "\033[32m No se encuentra registrado \033[0m";
					$clapF->registrado = 0;
					echo "\033[32m -> no esta registrado \033[0m";
				}
			}
		}

		$clapF->save();
		echo "\n";
	}
	echo "---------------------------------------------------------------------\n";
	echo "\n";
}

