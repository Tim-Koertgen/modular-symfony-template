<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\UserPassword\Business;

class UserPasswordFacade implements UserPasswordFacadeInterface
{
    /**
     * @var UserPasswordBusinessFactory
     */
    private UserPasswordBusinessFactory $factory;

    /**
     * @param UserPasswordBusinessFactory $factory
     */
    public function __construct(UserPasswordBusinessFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $password
     * @return string
     */
    public function generate(string $password): string
    {
        return $this->factory
            ->createWriter()
            ->generate($password);
    }
}
