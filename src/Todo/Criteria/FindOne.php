<?php declare(strict_types=1);

namespace App\Todo\Criteria;

use App\Todo\Criteria;

class FindOne implements Criteria
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
