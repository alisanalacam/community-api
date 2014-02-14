<?php

namespace Phpist\Bundle\EventBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventControllerTest extends WebTestCase
{
    /** @var  Client */
    private $client;

    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    private $eventRepositoryMock;

    /** @var array */
    private $dataForFakeResponse = array('testing' => 'ok');

    public function setUp()
    {
        $this->client = static::createClient();
        $this->eventRepositoryMock = $this->getMockBuilder('Phpist\Bundle\EventBundle\Repository\EventRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findOneWithDetails', 'findAllWithDetails'))->getMock();
    }

    public function testGet()
    {
        $this->eventRepositoryMock->expects($this->any())->method('findOneWithDetails')
            ->with(1)
            ->will($this->returnValue($this->dataForFakeResponse));
        $this->client->getContainer()->set('phpist_event.repository.event_repository', $this->eventRepositoryMock);
        $this->client->request('GET',
            $this->client->getContainer()->get('router')->generate('phpist_event_get', array('id' => 1)));
        $response = $this->client->getResponse();
        $this->assertTrue($response->getStatusCode() == 200 && json_last_error() == JSON_ERROR_NONE);
        $this->assertJson(json_encode($this->dataForFakeResponse));
    }

    public function testGetAll()
    {
        $this->eventRepositoryMock->expects($this->any())->method('findAllWithDetails')
            ->will($this->returnValue($this->dataForFakeResponse));

        $this->client->getContainer()->set('phpist_event.repository.event_repository', $this->eventRepositoryMock);
        $this->client->request('GET',
            $this->client->getContainer()->get('router')->generate('phpist_event_get_all'));

        $response = $this->client->getResponse();
        $this->assertTrue($response->getStatusCode() == 200 && json_last_error() == JSON_ERROR_NONE);
        $this->assertJson(json_encode($this->dataForFakeResponse));

    }

}
