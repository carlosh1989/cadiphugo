<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Comercio extends Model {
	public $timestamps = false;
    protected $table = 'comercio';
	protected $primaryKey = 'id_com';
    //Ejemplo de definir campos
}
