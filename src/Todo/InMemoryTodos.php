<?php declare(strict_types=1);

namespace App\Todo;

use App\Todo\Criteria\FindAll;
use App\Todo\Criteria\FindOne;

class InMemoryTodos implements Todos
{
    private $memory = [];

    public function find(Criteria $criteria): array
    {
        if ($criteria instanceof FindAll) {
            return $this->memory;
        }

        if ($criteria instanceof FindOne) {
            return $this->memory[$criteria->getId()] ?? null;
        }

        return [];
    }

    public function save(array $todo): array
    {
        if (empty($todo['id'])) {
            // NOTE: Is new
            $todo['id'] = sizeof($this->memory) + 1;
            $todo['done'] = false;
            $this->memory[$todo['id']] = $todo;
            return $todo;
        } else {
            // NOTE: Is an update
            $this->memory[$todo['id']] = array_merge($this->memory[$todo['id']], $todo);
            return $this->memory[$todo['id']];
        }
    }
}
