<?php

namespace Rogercbe\Detective;

trait Filterable
{
    /**
     * @param $query
     * @param \Rogercbe\Detective\Filters $filters
     * @return mixed
     */
    public function scopeFilter($query, Filters $filters)
    {
        return $filters->apply($query);
    }
}