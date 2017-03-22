<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactoProveedor
 *
 * @package App
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 * @property string $proveedor
*/
class ContactoProveedor extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'email', 'proveedor_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProveedorIdAttribute($input)
    {
        $this->attributes['proveedor_id'] = $input ? $input : null;
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id')->withTrashed();
    }
    
}
