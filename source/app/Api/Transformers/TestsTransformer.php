<?php

namespace App\Api\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Tests;

/**
 * Class TestsTransformer
 * @package namespace App\Transformers;
 */
class TestsTransformer extends TransformerAbstract
{

    /**
     * Transform the Tests entity
     * @param App\Entities\Tests $model
     *
     * @return array
     */
    public function transform(Tests $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'title' => $model->title?: 'title',
            'content' => $model->content,
            'tag' => $model->tag,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
