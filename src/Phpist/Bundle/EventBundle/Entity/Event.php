<?php

namespace Phpist\Bundle\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Phpist\Bundle\EventBundle\Repository\EventRepository")
 */
class Event
{
    const STATUS_ACTIVE     = 'active';
    const STATUS_PASSIVE    = 'passive';
    const STATUS_DELETED    = 'deleted';

    const TYPE_EVENT        = 'event';
    const TYPE_WORKSHOP     = 'workshop';
    const TYPE_MEET_UP       = 'meetUp';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime")
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedDate", type="datetime")
     */
    private $updatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", columnDefinition="ENUM('active', 'passive', 'deleted')")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="ENUM('event', 'workshop', 'meetUp')")
     */
    private $type;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Session", mappedBy="event")
     */
    private $sessions;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_sale_url", type="string", length=255)
     */
    private $ticketSaleUrl;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=1000)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var float
     * @ORM\Column(name="latitude", type="decimal", precision=18, scale=12)
     */
    private $latitude;

    /**
     * @var float
     * @ORM\Column(name="longitude", type="decimal", precision=18, scale=12)
     */
    private $longitude;
    
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Sponsor", inversedBy="events")
     * @ORM\JoinTable(name="event_sponsor")
     */
    private $sponsors;

    public function __construct() {
        $this->sponsors = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setStatus($status)
    {
        if (!in_array($status, $this->getStatusList())) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param $type
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setType($type)
    {
        if(!in_array($type, $this->getTypeList())) {
            throw new \InvalidArgumentException('Invalid type');
        }
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    public function getStatusList()
    {
        return array(
            self::STATUS_ACTIVE,
            self::STATUS_PASSIVE,
            self::STATUS_DELETED
        );
    }

    public function getTypeList()
    {
        return array(
            self::TYPE_EVENT,
            self::TYPE_MEET_UP,
            self::TYPE_WORKSHOP
        );
    }

    /**
     * @param ArrayCollection $sessions
     */
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * @return ArrayCollection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $updatedDate
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * @param string $ticketSaleUrl
     */
    public function setTicketSaleUrl($ticketSaleUrl)
    {
        $this->ticketSaleUrl = $ticketSaleUrl;
    }

    /**
     * @return string
     */
    public function getTicketSaleUrl()
    {
        return $this->ticketSaleUrl;
    }
    
     /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param float
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add sponsors
     *
     * @param \Phpist\Bundle\EventBundle\Entity\Sponsor $sponsors
     * @return Event
     */
    public function addSponsor(\Phpist\Bundle\EventBundle\Entity\Sponsor $sponsors)
    {
        $this->sponsors[] = $sponsors;
    
        return $this;
    }

    /**
     * Remove sponsors
     *
     * @param \Phpist\Bundle\EventBundle\Entity\Sponsor $sponsors
     */
    public function removeSponsor(\Phpist\Bundle\EventBundle\Entity\Sponsor $sponsors)
    {
        $this->sponsors->removeElement($sponsors);
    }

    /**
     * Get sponsors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }
}
