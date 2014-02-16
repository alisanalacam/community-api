<?php

namespace Phpist\Bundle\CoreBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class EventExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $response = new JsonResponse(
            array(
                'success' => false,
                'error' => array(
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode()
                )
            )
        );

        $event->setResponse($response);
    }
}
