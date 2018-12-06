<?php

namespace Rogercbe\Detective;

trait Sortable
{
    /**
     * @param $query
     * @param \Rogercbe\Detective\Sorter $sorter
     * @return mixed
     */
    public function scopeSort($query, Sorter $sorter)
    {
        return $sorter->apply($query);
    }
}