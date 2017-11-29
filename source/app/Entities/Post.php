<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\Post
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
