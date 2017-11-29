<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Test
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $tag
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Test extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'tag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];
}
