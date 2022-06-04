<?php

namespace App\Tests\Backend\User\Business;

use App\Backend\User\Business\UserFacade;
use App\Backend\User\Business\UserFacadeInterface;
use App\Shared\User\Transfer\UserTransfer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserFacadeTest extends KernelTestCase
{
    public function testCreateUser()
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var UserFacadeInterface $userFacade */
        $userFacade = $container->get(UserFacade::class);

        $userTransfer = new UserTransfer();
        $userTransfer->email = 'test@test.test';
        $userTransfer->roles = ['ROLE_ADMIN'];

        $userTransfer = $userFacade->create($userTransfer, 'password');

        $this->assertEquals('test@test.test', $userTransfer->email);
        $this->assertContains('ROLE_ADMIN', $userTransfer->roles);
        $this->assertEquals(true, $userFacade->exists($userTransfer));
        $this->assertCount(1, $userFacade->list()->users);
    }
}