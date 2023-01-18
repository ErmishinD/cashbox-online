<?php


namespace App\Filters;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $request;
    protected $builder;
    protected string $table_name;

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

        $was_sorted = false;
        foreach ($this->sorting() as $sort) {
            if ($sort && method_exists($this, "sort_by_" . $sort['field']) && in_array($sort['type'], ['asc', 'desc'])) {
                $sort_function = "sort_by_" . $sort['field'];
                $this->$sort_function($sort['type']);
                $was_sorted = true;
            }
        }

        if (!$was_sorted) {
            $this->sort_by_created_at('desc');
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->get('columnFilters') ?? [];
    }

    public function sorting()
    {
        $sorts = $this->request->get('sort');
        if (is_string($sorts)) {
            $sorts = json_decode($sorts);
        }
        return $sorts ?? [];
    }

    protected function sort_by_created_at($direction)
    {
        $this->builder->orderBy($this->table_name . '.created_at', $direction);
    }
}
