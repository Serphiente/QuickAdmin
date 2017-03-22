<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comuna
 *
 * @package App
 * @property string $nombre
 * @property string $provincia
*/
class Comuna extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'provincia_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProvinciaIdAttribute($input)
    {
        $this->attributes['provincia_id'] = $input ? $input : null;
    }
    
    public function provincia()
    {
        return $this->belongsTo(Provincium::class, 'provincia_id')->withTrashed();
    }
    
}
