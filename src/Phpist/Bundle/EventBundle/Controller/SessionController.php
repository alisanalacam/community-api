<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SessionController extends Controller
{

    public function getAction($id)
    {
        try {
            return new JsonResponse(
                $this->getDoctrine()->getRepository('PhpistEventBundle:Session')->findOne($id)
            );
        } catch (NoResultException $e) {
            throw $this->createNotFoundException('Session not found');
        }
    }

}
