<?php 

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