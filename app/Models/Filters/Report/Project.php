<?php
/**
 * Created by PhpStorm.
 * User: vgavr
 * Date: 26.08.2021
 * Time: 12:42
 */

namespace App\Models\Filters\Report;


use App\Services\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Project implements Filter
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('project_id', $value);
    }
}
