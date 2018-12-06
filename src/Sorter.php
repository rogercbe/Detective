<?php

namespace Rogercbe\Detective;

use Illuminate\Http\Request;

abstract class Sorter
{
    protected $request;

    protected $builder;

    protected $sorters = [];

    /**
     * Sorter constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function apply($query)
    {
        $this->builder = $query;

        if (in_array($this->getSortedParam(), $this->sorters)) {
            if (method_exists($this, $this->getSortedParam())) {
                $method = $this->getSortedParam();

                return $this->$method();
            }

            return $this->builder->orderBy(
                $this->getSortedParam(),
                $this->getSortedDirection() ?: 'asc'
            );
        }

        return $this->builder;
    }

    /**
     * @return mixed
     */
    protected function getSortedParam()
    {
        return $this->request->get(
            config('detective.sorter.path')
        );
    }

    /**
     * @return mixed
     */
    protected function getSortedDirection()
    {
        return $this->request->get(
            config('detective.sorter.direction')
        );
    }
}