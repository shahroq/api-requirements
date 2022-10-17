<?php

namespace Domain\Product\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    protected $request;

    protected $builder;

    protected $filters = [];
    
    /**
     * __construct
     *
     * @param  mixed $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * apply filter
     *
     * @param  mixed $builder
     * @return void
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        $filters = array_filter($this->request->only($this->filters));

        foreach ($filters as $filterKey => $filterValue) {
            if (method_exists($this, $filterKey)) $this->$filterKey($filterValue);
        }

        return $this->builder;
    }
}
