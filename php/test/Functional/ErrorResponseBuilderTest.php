<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer\Test\Functional;

use Crak\Component\RestNormalizer\Builder\Data\ErrorDataBuilder;
use Crak\Component\RestNormalizer\Builder\ErrorResponseBuilder;
use Crak\Component\RestNormalizer\Collection\ErrorCollection;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\Error;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parameter;

/**
 * Class ErrorResponseBuilderTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ErrorResponseBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldThrowErrorIfNoErrorAdded()
    {
        $this->setExpectedException(
            ResponseBuilderException::CLASS_NAME,
            'One error at least is required in order to build a restful error'
        );
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), HttpErrorCode::code500());
        $builder->build();
    }

    public function testShouldGenerateAValidObjectForJSONSerialization()
    {
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), HttpErrorCode::code500());

        $builder
            ->addParameter(Parameter::create('firstName', 'john'))
            ->addError(Error::create('error message', 'ErrorType'));

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"firstName":"john"},"code":500,"message":"error message","errors":[{"message":"error message","reason":"ErrorType","location":""}]}',
            json_encode($builder->build())
        );
    }

    public function testShouldAddParameterCollection()
    {
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), HttpErrorCode::code500());

        $builder
            ->addParameters(new ParameterCollection(
                [
                    Parameter::create('firstName', 'john'),
                    Parameter::create('name', 'doe'),
                ]
            ))
            ->addError(Error::create('error message', 'ErrorType'));

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"firstName":"john","name":"doe"},"code":500,"message":"error message","errors":[{"message":"error message","reason":"ErrorType","location":""}]}',
            json_encode($builder->build())
        );
    }

    public function testShouldAddErrorCollection()
    {
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), HttpErrorCode::code500());

        $builder
            ->addErrors(new ErrorCollection(
                [
                    Error::create('e1', 'ErrorType'),
                    Error::create('e2', 'ErrorType'),
                ]
            ));

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{},"code":500,"message":"e1","errors":[{"message":"e1","reason":"ErrorType","location":""},{"message":"e2","reason":"ErrorType","location":""}]}',
            json_encode($builder->build())
        );
    }
} 