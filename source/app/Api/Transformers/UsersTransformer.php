<?php

namespace App\Api\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Users;

/**
 * Class UsersTransformer
 * @package namespace App\Transformers;
 */
class UsersTransformer extends TransformerAbstract
{

    /**
     * Transform the Users entity
     * @param App\Entities\Users $model
     *
     * @return array
     */
    public function transform(Users $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'username' => $model['username'],
            'email' => $model['email'],

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
