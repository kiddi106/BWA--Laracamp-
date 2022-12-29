<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Camps
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\CampsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Camps newQuery()
 * @method static \Illuminate\Database\Query\Builder|Camps onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Camps query()
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camps whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Camps withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Camps withoutTrashed()
 * @mixin \Eloquent
 */
class Camps extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','slug','price','category_id'];

    public function getIsRegisteredAttribute()
    {
       if (!Auth::check()) {
            return false;
       }

       return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }

    
}
