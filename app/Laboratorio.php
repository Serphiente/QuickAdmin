<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Laboratorio
 *
 * @package App
 * @property string $nombre
 * @property string $rut
 * @property string $dv
 * @property string $direccion
 * @property string $ciudad
 * @property string $telefono
 * @property string $email
*/
class Laboratorio extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'rut', 'dv', 'direccion', 'telefono', 'email', 'ciudad_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCiudadIdAttribute($input)
    {
        $this->attributes['ciudad_id'] = $input ? $input : null;
    }
    
    public function ciudad()
    {
        return $this->belongsTo(Comuna::class, 'ciudad_id')->withTrashed();
    }
    
}
