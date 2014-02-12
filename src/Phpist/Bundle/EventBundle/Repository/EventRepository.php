<?php
/**
 * Class Event
 * @package Phpist\Bundle\EventBundle\Repository
 */


namespace Phpist\Bundle\EventBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Phpist\Bundle\EventBundle\Entity\Event;

class EventRepository extends EntityRepository
{

    public function findOneWithDetails($id)
    {
        return $this->getEntityManager()->createQuery(
            'SELECT e, se, sp FROM PhpistEventBundle:Event e
            LEFT JOIN e.sessions se
            LEFT JOIN se.speaker sp
            WHERE e.id = :id AND e.status = :status')
            ->setParameters(
                array('id' => $id, 'status' => Event::STATUS_ACTIVE)
            )
            ->getSingleResult(Query::HYDRATE_ARRAY);
    }

    public function findAllWithDetails()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT e, se, sp FROM PhpistEventBundle:Event e
            LEFT JOIN e.sessions se
            LEFT JOIN se.speaker sp
            WHERE e.status = :status')
            ->setParameters(
                array('status' => Event::STATUS_ACTIVE)
            )
            ->getArrayResult();
    }


} 