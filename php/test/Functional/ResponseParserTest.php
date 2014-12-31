<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Functional;

use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parser\ResponseParser;

/**
 * Class ResponseParserTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResponseParser
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new ResponseParser();
    }

    public function testShouldBuildAnErrorResponseFromJSON()
    {
        $response = $this->parser->parse('{"apiVersion":"1.2","method":"GET","params":{"id":"42"},"code":500,"message":"e1","errors":[{"message":"e1","reason":"ErrorType","location":"l1"},{"message":"e2","reason":"ErrorType","location":""}]}');
        $this->assertSame('1.2', $response->getApiVersion()->getValue());
        $this->assertSame(HttpMethod::GET, $response->getHttpMethod()->getValue());
        $this->assertCount(1, $response->getParameters());
        $this->assertSame('id', $response->getParameters()->first()->getId()->getValue());
        $this->assertSame('42', $response->getParameters()->first()->getValue()->getValue());
        $this->assertSame(HttpErrorCode::CODE_500, $response->getHttpErrorCode()->getValue());
        $this->assertSame('e1', $response->getErrorMessage()->getValue());
        $this->assertCount(2, $response->getErrors());
        $this->assertSame($response->getErrorMessage()->getValue(), $response->getErrors()->first()->getMessage()->getValue());
        $this->assertSame('ErrorType', $response->getErrors()->first()->getReason()->getValue());
        $this->assertSame('l1', $response->getErrors()->first()->getLocation()->getValue());
    }

    public function testShouldBuildASuccessResponseFromJSON()
    {
        $response = $this->parser->parse('{"apiVersion":"1.2","method":"GET","params":{"firstName":"john"},"data":{"items":[{"id":42,"email":"blochon.rob@yahoo.ca"},{"id":38,"email":"lara.clette@gmail.com"}],"totalItems":2}}');
        $this->assertSame('1.2', $response->getApiVersion()->getValue());
        $this->assertSame(HttpMethod::GET, $response->getHttpMethod()->getValue());
        $this->assertCount(1, $response->getParameters());
        $this->assertSame('firstName', $response->getParameters()->first()->getId()->getValue());
        $this->assertSame('john', $response->getParameters()->first()->getValue()->getValue());
        $this->assertCount(2, $response->getData()->getItems());
        $this->assertSame($response->getData()->getItems()->count(), $response->getData()->getTotalItems()->getValue());
        $this->assertSame('{"id":42,"email":"blochon.rob@yahoo.ca"}', json_encode($response->getData()->getItems()->first()));
    }
} 