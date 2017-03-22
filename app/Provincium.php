<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provincium
 *
 * @package App
 * @property string $nombre
 * @property string $region
*/
class Provincium extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'region_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRegionIdAttribute($input)
    {
        $this->attributes['region_id'] = $input ? $input : null;
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id')->withTrashed();
    }
    
}
