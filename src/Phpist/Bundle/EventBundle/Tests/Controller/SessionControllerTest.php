<?php

namespace Phpist\Bundle\EventBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class SessionControllerTest extends WebTestCase
{
    /** @var  Client */
    private $client;

    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    private $sessionRepositoryMock;

    /** @var array */
    private $dataForFakeResponse = array('testing' => 'ok');


    public function setUp()
    {
        $this->client = static::createClient();
        $this->sessionRepositoryMock = $this->getMockBuilder('Phpist\Bundle\EventBundle\Repository\SessionRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findOne', 'findAllWithDetails'))->getMock();
    }

    public function testGet()
    {
        $this->sessionRepositoryMock->expects($this->any())->method('findOne')
            ->with(1)
            ->will($this->returnValue($this->dataForFakeResponse));
        $this->client->getContainer()->set('phpist_event.repository.session_repository', $this->sessionRepositoryMock);
        $this->client->request('GET',
            $this->client->getContainer()->get('router')->generate('phpist_session_get', array('id' => 1)));
        $response = $this->client->getResponse();
        $this->assertTrue($response->getStatusCode() == 200 && json_last_error() == JSON_ERROR_NONE);
        $this->assertJson(json_encode($this->dataForFakeResponse));
    }

    public function testGetAll()
    {
        $this->sessionRepositoryMock->expects($this->any())->method('findAllWithDetails')
            ->will($this->returnValue($this->dataForFakeResponse));
        $this->client->getContainer()->set('phpist_event.repository.session_repository', $this->sessionRepositoryMock);
        $this->client->request('GET',
            $this->client->getContainer()->get('router')->generate('phpist_session_get_all'));
        $response = $this->client->getResponse();
        $this->assertTrue($response->getStatusCode() == 200 && json_last_error() == JSON_ERROR_NONE);
        $this->assertJson(json_encode($this->dataForFakeResponse));
    }

}
