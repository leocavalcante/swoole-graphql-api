<?php declare(strict_types=1);

namespace App\Todo\Resolver;

use App\Todo\Criteria;
use App\Todo\Todos;

class Query
{
    /** @var Todos */
    private $todos;

    /** @var Criteria */
    private $criteria;

    public function __construct(Todos $todos, Criteria $criteria)
    {
        $this->todos = $todos;
        $this->criteria = $criteria;
    }

    public function __invoke()
    {
        return $this->todos->find($this->criteria);
    }
}
