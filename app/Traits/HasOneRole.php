<?php

namespace App\Traits;

trait HasOneRole
{
    public function getRole()
    {
        return (count($this->getRoleNames()) == 0) ? 'guest' : $this->getRoleNames()[0];
    }
}
