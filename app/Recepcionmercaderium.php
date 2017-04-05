<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recepcionmercaderium
 *
 * @package App
 * @property string $proveedor
 * @property string $fecha
 * @property string $producto
 * @property string $lote
 * @property string $fecha_vencimiento
 * @property integer $cantidad
 * @property integer $precio_compra
*/
class Recepcionmercaderium extends Model
{
    use SoftDeletes;
    protected $table ="recepcionmercaderias";
    protected $fillable = ['fecha', 'lote', 'fecha_vencimiento', 'cantidad', 'precio_compra', 'proveedor_id', 'producto_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProveedorIdAttribute($input)
    {
        $this->attributes['proveedor_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['fecha'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProductoIdAttribute($input)
    {
        $this->attributes['producto_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCantidadAttribute($input)
    {
        $this->attributes['cantidad'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPrecioCompraAttribute($input)
    {
        $this->attributes['precio_compra'] = $input ? $input : null;
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedoroc::class, 'proveedor_id')->withTrashed();
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id')->withTrashed();
    }
    
}
