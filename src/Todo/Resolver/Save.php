<?php declare(strict_types=1);

namespace App\Todo\Resolver;

use App\Todo\Todos;

class Save
{
    private $todos;

    public function __construct(Todos $todos)
    {
        $this->todos = $todos;
    }

    public function __invoke(?array $root, array $args)
    {
        $title = filter_var($args['input']['title'], FILTER_SANITIZE_STRING);
        $body = filter_var($args['input']['body'], FILTER_SANITIZE_STRING);
        $todo = ['title' => $title, 'body' => $body];
        return $this->todos->save($todo);
    }
}
