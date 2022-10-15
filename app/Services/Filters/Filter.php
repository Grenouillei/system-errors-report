<?php
/**
 * Created by PhpStorm.
 * User: MeitsWorkPc
 * Date: 25.10.2019
 * Time: 21:44
 */

namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value);
}
