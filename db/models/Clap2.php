<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Clap2 extends Model {
	public $timestamps = false;
    protected $table = 'claps';
    protected $fillable = ['codigo_clap','id_estado','id_municipio','id_parroquia','codigo_clap','nombre_clap','comunidad','cargo','tipo','cedula','nombre_apellido','telefono','estatus'];
    //Ejemplo de definir campos
}
