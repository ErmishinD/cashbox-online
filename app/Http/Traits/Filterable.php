<?php


namespace App\Http\Traits;


trait Filterable
{
    /**
     * Query constraint
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($builder, $filters)
    {
        if (!empty($filters)) {
            return $filters->apply($builder);
        }
        return $builder;
    }
}
