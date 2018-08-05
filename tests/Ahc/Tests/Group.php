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

class Group
{
    private $permission;

    public function __construct(Permission $permission = null)
    {
        $this->permission = $permission;
    }

    public function getPermission()
    {
        return $this->permission;
    }
}
