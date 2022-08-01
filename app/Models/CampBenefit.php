<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CampBenefit
 *
 * @property int $id
 * @property int $camp_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CampBenefitFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit query()
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit whereCampId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CampBenefit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CampBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['camp_id','name'];
}
