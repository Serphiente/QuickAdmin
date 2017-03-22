<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 *
 * @package App
 * @property string $rut
 * @property string $dv
 * @property string $nombre
 * @property string $direccion_factura
 * @property string $direccion_despacho
 * @property string $comuna
*/
class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['rut', 'dv', 'nombre', 'direccion_factura', 'direccion_despacho', 'comuna_id'];
    

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
