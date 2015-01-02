<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Functional;

use Crak\Component\RestNormalizer\Builder\ResponseBuilder;
use Crak\Component\RestNormalizer\Error;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parameter;

/**
 * Class ResponseBuilderTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDetectIfItsAnError()
    {
        $builder = $this->getBuilder();
        $this->assertFalse($builder->isError());

        $builder->addError(Error::create('m', 'r'));
        $this->assertTrue($builder->isError());

        $builder = $this->getBuilder();
        $builder->setHttpErrorCode(HttpErrorCode::CODE_400());
        $this->assertTrue($builder->isError());
    }

    public function testShouldThrowErrorIfNoHttpErrorCodeSetForAnError()
    {
        $this->setExpectedException(
            ResponseBuilderException::CLASS_NAME,
            'HttpErrorCode is required for an Error'
        );

        $builder = $this->getBuilder();
        $builder->addError(Error::create('m', 'r'));
        $builder->build();
    }

    public function testShouldThrowErrorIfNoErrorAddedForAnError()
    {
        $this->setExpectedException(
            ResponseBuilderException::CLASS_NAME,
            'No error found'
        );

        $builder = $this->getBuilder();
        $builder->setHttpErrorCode(HttpErrorCode::CODE_400());
        $builder->build();
    }

    public function testShouldBuildASuccessResponse()
    {
        $item = new \stdClass();
        $item->firstname = 'john';

        $builder = ResponseBuilder::create('1.2', HttpMethod::GET());
        $builder
            ->addParameter(Parameter::create('id', '42'))
            ->addItem($item);

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"id":"42"},"data":{"items":[{"firstname":"john"}],"totalItems":1}}',
            json_encode($builder->build())
        );
    }

    public function testShouldBuildAnErrorResponse()
    {
        $item = new \stdClass();
        $item->firstname = 'john';

        $builder = ResponseBuilder::create('1.2', HttpMethod::GET());
        $builder
            ->addParameter(Parameter::create('id', '42'))
            ->addItem($item) // just to be sur it'll not appear into the JSON string
            ->addError(Error::create('error message 1', 'reason1'))
            ->addError(Error::create('error message 2', 'reason2', 'location2'))
            ->setHttpErrorCode(HttpErrorCode::CODE_402());

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"id":"42"},"code":402,"message":"error message 1","errors":[{"message":"error message 1","reason":"reason1","location":""},{"message":"error message 2","reason":"reason2","location":"location2"}]}',
            json_encode($builder->build())
        );
    }

    private function getBuilder()
    {
        return ResponseBuilder::create('1.2', HttpMethod::GET());;
    }
} 