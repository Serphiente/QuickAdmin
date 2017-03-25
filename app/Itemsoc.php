<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Itemsoc
 *
 * @package App
 * @property string $folio
 * @property string $producto
 * @property string $presentancion
 * @property integer $cantidad
 * @property decimal $precio_unidad
 * @property text $observaciones
*/
class Itemsoc extends Model
{
    use SoftDeletes;

    protected $fillable = ['cantidad', 'precio_unidad', 'observaciones', 'folio_id', 'producto_id', 'presentancion_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFolioIdAttribute($input)
    {
        $this->attributes['folio_id'] = $input ? $input : null;
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
     * Set to null if empty
     * @param $input
     */
    public function setPresentancionIdAttribute($input)
    {
        $this->attributes['presentancion_id'] = $input ? $input : null;
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
    public function setPrecioUnidadAttribute($input)
    {
        $this->attributes['precio_unidad'] = $input ? $input : null;
    }
    
    public function folio()
    {
        return $this->belongsTo(Proveedoroc::class, 'folio_id')->withTrashed();
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id')->withTrashed();
    }
    
    public function presentancion()
    {
        return $this->belongsTo(PresentacionFarmacologica::class, 'presentancion_id')->withTrashed();
    }
    
}
