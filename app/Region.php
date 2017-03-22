<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 *
 * @package App
 * @property string $nombre
 * @property string $ordinal
*/
class Region extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'ordinal'];
    
    
}
