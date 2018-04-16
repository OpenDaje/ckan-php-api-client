<?php

use OpenDaje\RestClient\CkanApiClient;



//use GuzzleHttp\Command\ResultInterface;
//use GuzzleHttp\Psr7\Response;


use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

use GuzzleHttp\Handler\MockHandler;

use GuzzleHttp\HandlerStack;

use GuzzleHttp\Psr7\Stream;


#use GuzzleHttp\Tests\Server;

use PHPUnit\Framework\TestCase;


/**
 * @coversDefaultClass \OpenDaje\RestClient\CkanApiClient
 */
class CkanApiClientTest extends TestCase
{
    /**
     * @var CkanApiClient
     */
    public $client;

    public function setUp()
    {
        parent::setUp();
//
//        // Start the guzzle test server.
//        Server::start();
//
//        register_shutdown_function(function(){Server::stop();});
//
        $this->client = CkanApiClient::create([
            //'base_uri' => Server::$url,
            'base_uri' => 'Http://www.example.com',
            'X-CKAN-API-Key' => $_SERVER['API_KEY'],

        ]);
    }


    public function testPushAndPop()
    {
                $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }


    public function test_it_get_package_list()
    {
        $this->markTestSkipped();
    }
}