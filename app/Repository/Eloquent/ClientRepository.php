<?php

namespace App\Repository\Eloquent;

use App\Client;
use App\Repository\ClientRepositoryInterface;
use App\Repository\Filters\ClientSearchFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    /**
     * ClientRepository constructor.
     *
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    /**
     * @param ClientSearchFilter $filter
     * @return Collection
     */
    public function search(ClientSearchFilter $filter): Collection
    {
        $query = $this->model->query();

        $this->addConditions($query, $filter);

        return $query->limit(10)->get();
    }

    /**
     * @param Builder $builder
     * @param ClientSearchFilter $filter
     */
    private function addConditions(Builder $builder, ClientSearchFilter $filter): void
    {
        if (null !== $filter->getSearch()) {
            $builder->where(function ($q) use ($filter){
                $q->whereRaw(
                    "concat(first_name, ' ', last_name) like ?",
                    [
                        '%'.$filter->getSearch().'%'
                    ]
                );
            });
        }
    }
}
