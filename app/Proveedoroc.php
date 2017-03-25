<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proveedoroc
 *
 * @package App
 * @property integer $folio
 * @property string $proveedor
 * @property string $fecha
 * @property text $observaciones
*/
class Proveedoroc extends Model
{
    use SoftDeletes;

    protected $fillable = ['folio', 'fecha', 'observaciones', 'proveedor_id'];
    

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
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id')->withTrashed();
    }
    
}
