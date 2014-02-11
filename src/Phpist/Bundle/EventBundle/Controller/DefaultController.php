<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PhpistEventBundle:Default:index.html.twig', array('name' => $name));
    }
}
