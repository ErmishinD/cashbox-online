<?php


namespace App\Filters;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        foreach ($this->sorting() as $sort) {
            if ($sort && method_exists($this, "sort_by_".$sort['field']) && in_array($sort['type'], ['asc', 'desc'])) {
                $sort_function = "sort_by_".$sort['field'];
                $this->$sort_function($sort['type']);
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->get('columnFilters') ?? [];
    }

    public function sorting()
    {
        return $this->request->get('sort') ?? [];
    }
}
