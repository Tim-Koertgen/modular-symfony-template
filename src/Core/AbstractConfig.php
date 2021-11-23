<?php

namespace App\Core;

abstract class AbstractConfig
{
    protected function get(string $constant)
    {
        return $_ENV[$constant];
    }
}