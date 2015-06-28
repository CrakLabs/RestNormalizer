<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\Error;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;

/**
 * Class ParameterTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveTheFirstErrorMessage()
    {
        $response = Response::create(
            HttpMethod::GET(),
            '1.2',
            true,
            HttpErrorCode::code412(),
            [
                Error::create('first error', 'Error'),
                Error::create('second error', 'Error'),
            ]
        );
        $this->assertSame('first error', $response->getErrorMessage()->getValue());

        $response = Response::create(
            HttpMethod::GET(),
            '1.2',
            true,
            HttpErrorCode::code412()
        );
        $this->assertSame('', $response->getErrorMessage()->getValue());
    }
} 