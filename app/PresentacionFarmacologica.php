<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PresentacionFarmacologica
 *
 * @package App
 * @property string $nombre
 * @property string $nombre_corto
*/
class PresentacionFarmacologica extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'nombre_corto'];
    
    
}
