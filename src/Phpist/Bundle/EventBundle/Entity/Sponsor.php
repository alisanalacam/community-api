<?php

namespace Phpist\Bundle\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="Phpist\Bundle\EventBundle\Repository\SponsorRepository")
 */
class Sponsor
{
    const SPONSORTYPE_GOLD     = 'gold';
    const SPONSORTYPE_PLATIN   = 'platin';
    const SPONSORTYPE_STANDARD = 'standard';

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
     * @ORM\Column(name="sponsorName", type="string", length=255)
     */
    private $sponsorName;

    /**
     * @var string
     *
     * @ORM\Column(name="sponsorUrl", type="string", length=255)
     */
    private $sponsorUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="sponsorLogo", type="string", length=255)
     */
    private $sponsorLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="sponsorType", type="string", columnDefinition="ENUM('gold', 'platin', 'standard')")
     */
    private $sponsorType;

    /**
     * @var string
     *
     * @ORM\Column(name="supporter", type="string", length=255)
     */
    private $supporter;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sponsorName
     *
     * @param string $sponsorName
     * @return Sponsor
     */
    public function setSponsorName($sponsorName)
    {
        $this->sponsorName = $sponsorName;

        return $this;
    }

    /**
     * Get sponsorName
     *
     * @return string
     */
    public function getSponsorName()
    {
        return $this->sponsorName;
    }

    /**
     * Set sponsorUrl
     *
     * @param string $sponsorUrl
     * @return Sponsor
     */
    public function setSponsorUrl($sponsorUrl)
    {
        $this->sponsorUrl = $sponsorUrl;

        return $this;
    }

    /**
     * Get sponsorUrl
     *
     * @return string
     */
    public function getSponsorUrl()
    {
        return $this->sponsorUrl;
    }

    /**
     * Set sponsorLogo
     *
     * @param string $sponsorLogo
     * @return Sponsor
     */
    public function setSponsorLogo($sponsorLogo)
    {
        $this->sponsorLogo = $sponsorLogo;

        return $this;
    }

    /**
     * Get sponsorLogo
     *
     * @return string
     */
    public function getSponsorLogo()
    {
        return $this->sponsorLogo;
    }

    /**
     * Set sponsorType
     *
     * @param $sponsorType
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setSponsorType($sponsorType)
    {
        if (!in_array($sponsorType, $this->getSponsorTypeList())) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->sponsorType = $sponsorType;

        return $this;

    }

    /**
     * Get sponsorType
     *
     * @return string
     */
    public function getSponsorType()
    {
        return $this->sponsorType;
    }


    public function getSponsorTypeList()
    {
        return array(
            self::SPONSORTYPE_GOLD,
            self::SPONSORTYPE_PLATIN,
            self::SPONSORTYPE_STANDARD
        );
    }

    /**
     * Set supporter
     *
     * @param string $supporter
     * @return Sponsor
     */
    public function setSupporter($supporter)
    {
        $this->supporter = $supporter;

        return $this;
    }

    /**
     * Get supporter
     *
     * @return string
     */
    public function getSupporter()
    {
        return $this->supporter;
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
}
