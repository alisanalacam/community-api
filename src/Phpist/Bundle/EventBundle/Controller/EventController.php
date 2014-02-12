<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{

    public function getAction($id)
    {
        try {
            $event = $this->getDoctrine()->getRepository('PhpistEventBundle:Event')->findOneWithDetails($id);
            return new JsonResponse(
                $event
            );

        } catch (NoResultException $e) {
            throw $this->createNotFoundException('Event not found');

        }
    }

    public function getAllAction()
    {
        $events = $this->getDoctrine()->getRepository('PhpistEventBundle:Event')->findAllWithDetails();

        if (empty($events)) {
            throw $this->createNotFoundException('Event list not found');
        }

        return new JsonResponse(
            $events
        );
    }

}
