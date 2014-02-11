<?php

namespace Phpist\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PhpistUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
