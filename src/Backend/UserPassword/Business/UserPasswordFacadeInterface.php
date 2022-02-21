<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserPassword\Business;

interface UserPasswordFacadeInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function generate(string $password): string;
}
