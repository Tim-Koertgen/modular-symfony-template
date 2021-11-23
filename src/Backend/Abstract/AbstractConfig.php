<?php

namespace App\Backend\Abstract;

abstract class AbstractConfig
{
    protected function get(string $constant)
    {
        return $_ENV[$constant];
    }
}