<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\SalesRepresentative
 *
 * @property int $id
 * @property int $sales_manager_id
 * @property int $current_working_route_id
 * @property string $full_name
 * @property string $email
 * @property string $telephone
 * @property string $joined_date
 * @property string|null $comment
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read WorkingRoute $currentWorkingRoute
 * @property-read User $salesManager
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative newQuery()
 * @method static Builder|SalesRepresentative onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereCurrentWorkingRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereJoinedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereSalesManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRepresentative whereUpdatedAt($value)
 * @method static Builder|SalesRepresentative withTrashed()
 * @method static Builder|SalesRepresentative withoutTrashed()
 * @mixin Eloquent
 */
class SalesRepresentative extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sales_manager_id',
        'current_working_route_id',
        'full_name',
        'email',
        'telephone',
        'joined_date',
        'comment'
    ];

    /**
     * @return BelongsTo
     */
    public function salesManager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sales_manager_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function currentWorkingRoute(): BelongsTo
    {
        return $this->belongsTo(WorkingRoute::class, 'current_working_route_id', 'id');
    }

}
