<?php

declare(strict_types=1);

namespace App\StaticInstance;

use Hyperf\Utils\Traits\StaticInstance;

class ApiRequest
{
    use StaticInstance;

    protected $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
