<?php

namespace App\Repository\Filters\Traits;

trait SearchTrait
{
    /**
     * @var string|null
     */
    private $search;

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     *
     * @return SearchTrait
     */
    public function setSearch(?string $search): self
    {
        $this->search = $search;

        return $this;
    }
}
