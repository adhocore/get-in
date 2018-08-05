<?php

/*
 * This file is part of the GET-IN package.
 *
 * (c) Jitendra Adhikari <jiten.adhikary@gmail.com>
 *     <https://github.com/adhocore>
 *
 * Licensed under MIT license.
 */

namespace Ahc\Tests;

class User
{
    private $group;

    public function __construct(Group $group = null)
    {
        $this->group = $group;
    }

    public function getGroup()
    {
        return $this->group;
    }
}
