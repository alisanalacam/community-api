<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{

    public function getAction($id)
    {
        $event = $this->getDoctrine()->getRepository('PhpistEventBundle:Event')->findOneWithDetails($id);

        if (empty($event)) {
            throw $this->createNotFoundException('Event not found');
        }

        return new JsonResponse(
            $event
        );
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
