<?php

/*
 * This file is part of the GET-IN package.
 *
 * (c) Jitendra Adhikari <jiten.adhikary@gmail.com>
 *     <https//:github.com/adhocore>
 *
 * Licensed under MIT license.
 */

namespace Ahc\Tests;

use Ahc\Get as GetIn;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    public function testWithAllMethodsAndValues()
    {
        $this->assertEquals(
            'permission name',
            GetIn::in(
                new User(new Group(new Permission('permission name'))),
                'getGroup.getPermission.getName'
            )
        );

        // methods as array
        $this->assertEquals(
            'permission name',
            GetIn::in(
                new User(new Group(new Permission('permission name'))),
                ['getGroup', 'getPermission', 'getName']
            )
        );
    }

    public function testWithDefaultPermissionName()
    {
        $this->assertEquals(
            'default permission name',
            GetIn::in(
                new User(new Group(new Permission())),
                'getGroup.getPermission.getName',
                'default permission name'
            )
        );
    }

    public function testMissingMethod()
    {
        $permission = new Permission();
        $this->assertEquals(
            $permission,
            GetIn::in(
                new User(new Group($permission)),
                'getGroup.getPermission'
            )
        );
    }

    public function testMissingMethodWithDefault()
    {
        $otherPermission = new Permission('other');
        $this->assertEquals(
            $otherPermission,
            GetIn::in(
                new User(new Group()),
                'getGroup.getPermission',
                $otherPermission
            )
        );
    }

    public function testMissingMethodWithNonExistedMethod()
    {
        $otherPermission = new Permission('other');
        $this->assertEquals(
            $otherPermission,
            GetIn::in(
                new User(new Group()),
                'getInvalidGroup.invalidMethod',
                $otherPermission
            )
        );
    }
}
