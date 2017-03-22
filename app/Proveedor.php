<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proveedor
 *
 * @package App
 * @property string $nombre
 * @property string $rut
 * @property string $dv
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $comuna
*/
class Proveedor extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'rut', 'dv', 'direccion', 'telefono', 'email', 'comuna_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setComunaIdAttribute($input)
    {
        $this->attributes['comuna_id'] = $input ? $input : null;
    }
    
    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comuna_id')->withTrashed();
    }
    
}
