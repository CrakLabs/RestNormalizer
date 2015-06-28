<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class HttpMethodTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HttpMethodTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveGET()
    {
        $this->assertSame(HttpMethod::GET, HttpMethod::get()->getValue());
    }

    public function testShouldHaveHEAD()
    {
        $this->assertSame(HttpMethod::HEAD, HttpMethod::head()->getValue());
    }

    public function testShouldHavePOST()
    {
        $this->assertSame(HttpMethod::POST, HttpMethod::post()->getValue());
    }

    public function testShouldHavePUT()
    {
        $this->assertSame(HttpMethod::PUT, HttpMethod::put()->getValue());
    }

    public function testShouldHavePATCH()
    {
        $this->assertSame(HttpMethod::PATCH, HttpMethod::patch()->getValue());
    }

    public function testShouldHaveDELETE()
    {
        $this->assertSame(HttpMethod::DELETE, HttpMethod::delete()->getValue());
    }
} 