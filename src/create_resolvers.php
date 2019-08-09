<?php declare(strict_types=1);

namespace App;

use App\Todo\Criteria\FindAll;
use App\Todo\Criteria\FindOne;
use App\Todo\Resolver\Query;
use App\Todo\Resolver\Save;
use App\Todo\Todos;

function create_resolvers(Todos $todos)
{
    return [
        'Query' => [
            'todos' => new Query($todos, new FindAll()),
            'todo' => function (?array $root, array $args) use ($todos) {
                // Please, come fast arrow functions!
                return (new Query($todos, new FindOne($args['id'])))();
            },
        ],
        'Mutation' => [
            'saveTodo' => new Save($todos),
        ],
    ];
}
