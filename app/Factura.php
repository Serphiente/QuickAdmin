<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Factura
 *
 * @package App
 * @property integer $folio
 * @property string $vendedor
 * @property string $fecha
 * @property string $cliente
 * @property string $producto
 * @property integer $cantidad
 * @property decimal $precio
 * @property integer $condicion_pago
 * @property tinyInteger $estado_pago
 * @property tinyInteger $documento_valido
*/
class Factura extends Model
{
    use SoftDeletes;

    protected $fillable = ['folio', 'fecha', 'cantidad', 'precio', 'condicion_pago', 'estado_pago', 'documento_valido', 'vendedor_id', 'cliente_id', 'producto_id'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setFolioAttribute($input)
    {
        $this->attributes['folio'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setVendedorIdAttribute($input)
    {
        $this->attributes['vendedor_id'] = $input ? $input : null;
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
    public function setClienteIdAttribute($input)
    {
        $this->attributes['cliente_id'] = $input ? $input : null;
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
    public function setPrecioAttribute($input)
    {
        $this->attributes['precio'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCondicionPagoAttribute($input)
    {
        $this->attributes['condicion_pago'] = $input ? $input : null;
    }
    
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id')->withTrashed();
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id')->withTrashed();
    }
    
}
