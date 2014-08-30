<?php 

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