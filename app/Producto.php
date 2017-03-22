<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 *
 * @package App
 * @property string $nombre
 * @property string $concentracion
 * @property decimal $precio_bodega
 * @property string $laboratorio
 * @property string $presentacion
 * @property string $modo_uso
*/
class Producto extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'concentracion', 'precio_bodega', 'laboratorio_id', 'presentacion_id', 'modo_uso_id'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPrecioBodegaAttribute($input)
    {
        $this->attributes['precio_bodega'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLaboratorioIdAttribute($input)
    {
        $this->attributes['laboratorio_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPresentacionIdAttribute($input)
    {
        $this->attributes['presentacion_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setModoUsoIdAttribute($input)
    {
        $this->attributes['modo_uso_id'] = $input ? $input : null;
    }
    
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, 'laboratorio_id')->withTrashed();
    }
    
    public function presentacion()
    {
        return $this->belongsTo(PresentacionFarmacologica::class, 'presentacion_id')->withTrashed();
    }
    
    public function modo_uso()
    {
        return $this->belongsTo(ModoUso::class, 'modo_uso_id')->withTrashed();
    }
    
}
