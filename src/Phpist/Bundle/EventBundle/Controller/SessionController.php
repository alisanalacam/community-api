<?php

namespace Phpist\Bundle\EventBundle\Controller;

use Doctrine\ORM\NoResultException;
use Phpist\Bundle\EventBundle\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SessionController extends Controller
{

    public function getAction($id)
    {
        /** @var SessionRepository $sessionRepository */
        $sessionRepository = $this->container->get('phpist_event.repository.session_repository');
        try {
            return new JsonResponse(
                $sessionRepository->findOne($id)
            );
        } catch (NoResultException $e) {
            throw $this->createNotFoundException('Session not found');
        }
    }

    public function getAllAction()
    {
        /** @var SessionRepository $sessionRepository */
        $sessionRepository = $this->container->get('phpist_event.repository.session_repository');

        $sessions = $sessionRepository->findAllWithDetails();

        if (empty($sessions)) {
            throw $this->createNotFoundException('There is no session at all.');
        }

        return new JsonResponse(
            $sessions
        );
    }
}
