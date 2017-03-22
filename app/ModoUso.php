<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModoUso
 *
 * @package App
 * @property string $uso
*/
class ModoUso extends Model
{
    use SoftDeletes;

    protected $fillable = ['uso'];
    
    
}
