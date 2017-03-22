<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactoCliente
 *
 * @package App
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 * @property string $cliente
*/
class ContactoCliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'email', 'cliente_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setClienteIdAttribute($input)
    {
        $this->attributes['cliente_id'] = $input ? $input : null;
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id')->withTrashed();
    }
    
}
