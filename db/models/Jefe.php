<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Jefe extends Model {
	public $timestamps = false;
    protected $table = 'registro_estudio_datos_del_encuestado';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos
}
