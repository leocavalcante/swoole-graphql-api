<?php declare(strict_types=1);

namespace App\Todo;

interface Todos
{
    public function find(Criteria $criteria): array;
    public function save(array $todo): array;
}
