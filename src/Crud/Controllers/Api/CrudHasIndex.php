<?php

namespace Fjord\Crud\Controllers\Api;

use Fjord\Support\IndexTable;
use Fjord\Crud\Requests\CrudReadRequest;

trait CrudHasIndex
{
    /**
     * Load index table items.
     *
     * @param CrudReadRequest $request
     * @return array $items
     */
    public function indexTable(CrudReadRequest $request)
    {
        $query = $this->config->indexQuery(
            $this->query()
        );

        return IndexTable::get($query, $request);
    }
}
