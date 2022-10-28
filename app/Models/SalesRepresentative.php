<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
