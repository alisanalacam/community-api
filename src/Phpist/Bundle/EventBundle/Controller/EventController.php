<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Doctrine\ORM\NoResultException;
use Phpist\Bundle\EventBundle\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{

    public function getAction($id)
    {
        /** @var EventRepository $eventRepository */
        $eventRepository = $this->container->get('phpist_event.repository.event_repository');

        try {
            return new JsonResponse(
                $eventRepository->findOneWithDetails($id)
            );
        } catch (NoResultException $e) {
            throw $this->createNotFoundException('Event not found');
        }

    }

    public function getAllAction()
    {
        /** @var EventRepository $eventRepository */
        $eventRepository = $this->container->get('phpist_event.repository.event_repository');

        $events = $eventRepository->findAllWithDetails();

        if (empty($events)) {
            throw $this->createNotFoundException('Event list not found');
        }

        return new JsonResponse(
            $events
        );
    }

}
