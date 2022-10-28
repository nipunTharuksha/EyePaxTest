<?php

namespace App\Models;

use Database\Factories\WorkingRouteFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\WorkingRoute
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static WorkingRouteFactory factory(...$parameters)
 * @method static Builder|WorkingRoute newModelQuery()
 * @method static Builder|WorkingRoute newQuery()
 * @method static Builder|WorkingRoute query()
 * @method static Builder|WorkingRoute whereCreatedAt($value)
 * @method static Builder|WorkingRoute whereId($value)
 * @method static Builder|WorkingRoute whereName($value)
 * @method static Builder|WorkingRoute whereUpdatedAt($value)
 * @mixin Eloquent
 */
class WorkingRoute extends Model
{
    use HasFactory;
}
