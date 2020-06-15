<?php

namespace App\Repository;

use App\Repository\Filters\ClientSearchFilter;
use Illuminate\Support\Collection;

interface ClientRepositoryInterface
{
    /**
     * @param ClientSearchFilter $filter
     *
     * @return Collection
     */
    public function search(ClientSearchFilter $filter): Collection;
}
