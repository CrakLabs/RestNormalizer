<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\Builder\Data\ErrorDataBuilder;
use Crak\Component\RestNormalizer\Builder\ErrorResponseBuilder;
use Crak\Component\RestNormalizer\Error;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class ErrorResponseBuilderTest
 * @package Crak\Component\RestNormalizer\Test\Unit
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
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), 42);
        $builder->build();
    }

    public function testShouldGenerateAValidObjectForJSONSerialization()
    {
        $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), 42);
        $builder->addError(Error::create('error message', 'ErrorType'));

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{},"code":42,"message":"error message","errors":[{"message":"error message","reason":"ErrorType"}]}',
            json_encode($builder->build())
        );
    }
} 