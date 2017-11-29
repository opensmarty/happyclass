<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model recent()
 * @mixin \Eloquent
 */
class Model extends EloquentModel
{
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}