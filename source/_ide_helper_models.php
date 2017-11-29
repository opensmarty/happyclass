<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class Test extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model recent()
 * @mixin \Eloquent
 */
	class Model extends \Eloquent {}
}

namespace App\Entities{
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
	class Post extends \Eloquent {}
}

