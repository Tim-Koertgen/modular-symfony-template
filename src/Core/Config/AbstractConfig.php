<?php

namespace App\Core\Config;

abstract class AbstractConfig
{
    protected function get(string $constant)
    {
        return $_ENV[$constant];
    }
}
