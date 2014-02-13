<?php
/**
 * Class Session
 * @package Phpist\Bundle\EventBundle\Repository
 */


namespace Phpist\Bundle\EventBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Phpist\Bundle\EventBundle\Entity\Session;
use Doctrine\ORM\Query;

class SessionRepository extends EntityRepository
{

    public function findOne($id)
    {
        return $this->getEntityManager()->createQuery(
            'SELECT se FROM PhpistEventBundle:Session se WHERE se.id = :id AND se.status = :status'
        )
            ->setParameters(array('id' => $id, 'status' => Session::STATUS_ACTIVE))
            ->getSingleResult(Query::HYDRATE_ARRAY);
    }
    public function findAllWithDetails()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT se FROM PhpistEventBundle:Session se WHERE se.status = :status ORDER BY se.startDate DESC')
            ->setParameters(
                array('status' => Session::STATUS_ACTIVE)
            )
            ->setMaxResults(10)
            ->getArrayResult();
    }
} 