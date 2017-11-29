<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Index;

/**
 * Class IndexTransformer
 * @package namespace App\Transformers;
 */
class IndexTransformer extends TransformerAbstract
{

    /**
     * Transform the Index entity
     * @param App\Entities\Index $model
     *
     * @return array
     */
    public function transform(Index $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
