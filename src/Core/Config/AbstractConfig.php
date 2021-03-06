<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Core\Config;

abstract class AbstractConfig
{
    /**
     * @param string $constant
     * @return mixed
     */
    protected function get(string $constant): mixed
    {
        return $_ENV[$constant];
    }
}
