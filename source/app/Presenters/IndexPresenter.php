<?php

namespace App\Presenters;

use App\Transformers\IndexTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class IndexPresenter
 *
 * @package namespace App\Presenters;
 */
class IndexPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IndexTransformer();
    }
}
