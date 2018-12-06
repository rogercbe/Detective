<?php

namespace Rogercbe\Detective;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class Filters
{
    protected $request;

    protected $builder;

    protected $filters = [];

    /**
     * Filters constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            $method = Str::camel($filter);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this->builder;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array_filter($this->request->only($this->filters));
    }
}