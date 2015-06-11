<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Functional\Silex\Provider;

use Crak\Component\RestNormalizer\Builder\ResponseBuilder;
use Crak\Component\RestNormalizer\Silex\Provider\RestNormalizerProvider;
use Crak\Component\RestNormalizer\Test\Functional\Silex\Provider\Fixtures\TestObject;
use PHPUnit_Framework_MockObject_MockObject;
use Silex\Application;

/**
 * PHPUnit RestNormalizerProviderTest
 *
 * @package  Crak\Component\RestNormalizer\Test\Functional\Silex\Provider
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
class RestNormalizerProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $requestParametersBag;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $request;

    public function setUp()
    {
        $this->requestParametersBag = $this->getMock('\Symfony\Component\HttpFoundation\ParameterBag');
        $this->request = $this->getMockBuilder('\Symfony\Component\HttpFoundation\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $this->request->request = $this->requestParametersBag;
    }

    public function testShouldProvideResponseBuilderWithoutSpecificVersion()
    {
        $silex = new Application();
        $silex->register(new RestNormalizerProvider());

        $this->assertRequestGetMethod('GET');
        $this->assertRequestParametersBagGetAll();
        $silex['request'] = $this->request;

        $closure = $silex['rest_normalizer.builder'];

        $this->assertInstanceOf('\Closure', $closure);
        $builder = $closure->__invoke();
        /** @var $builder ResponseBuilder */

        $response = $builder->build();

        $this->assertSame('0.1.0', $response->apiVersion);
    }

    public function testShouldProvideResponseBuilderWithSpecificVersion()
    {
        $silex = new Application();
        $silex->register(
            new RestNormalizerProvider(),
            array('rest_normalizer.version' => '2.0')
        );

        $this->assertRequestGetMethod('GET');
        $this->assertRequestParametersBagGetAll();

        $silex['request'] = $this->request;

        $closure = $silex['rest_normalizer.builder'];

        $this->assertInstanceOf('\Closure', $closure);
        $builder = $closure->__invoke();
        /** @var $builder ResponseBuilder */

        $response = $builder->build();

        $this->assertSame('2.0', $response->apiVersion);
        $this->assertSame('GET', $response->method);
    }

    public function testShouldProvideResponseBuilderWithParameters()
    {
        $silex = new Application();
        $silex->register(new RestNormalizerProvider());

        $this->assertRequestGetMethod('GET');
        $this->assertRequestParametersBagGetAll(array('foo' => 'bar'));
        $silex['request'] = $this->request;

        $closure = $silex['rest_normalizer.builder'];

        $this->assertInstanceOf('\Closure', $closure);
        $builder = $closure->__invoke();
        /** @var $builder ResponseBuilder */

        $response = $builder->build();

        $this->assertInstanceOf('\stdClass', $response->params);
        $this->assertSame('bar', $response->params->foo);
    }

    public function testShouldProvideResponseBuilderWithObject()
    {
        $silex = new Application();
        $silex->register(new RestNormalizerProvider());

        $this->assertRequestGetMethod('GET');
        $this->assertRequestParametersBagGetAll(array('foo' => 'bar'));
        $silex['request'] = $this->request;

        $closure = $silex['rest_normalizer.builder'];

        $this->assertInstanceOf('\Closure', $closure);

        $className = TestObject::CLASS_NAME;
        $builder = $closure->__invoke($className);
        /** @var $builder ResponseBuilder */

        $someObject = new $className();

        $response = $builder->addItem($someObject)->build();

        $this->assertInstanceOf('\stdClass', $response->data);
        $this->assertTrue(is_array($response->data->items));
        $this->assertInstanceOf($className, $response->data->items[0]);
    }

    private function assertRequestGetMethod($method)
    {
        $this->request
            ->expects($this->any())
            ->method('getMethod')
            ->willReturn($method);
    }

    private function assertRequestParametersBagGetAll($parameters = array())
    {
        $this->requestParametersBag
            ->expects($this->any())
            ->method('all')
            ->willReturn($parameters);
    }
}
 