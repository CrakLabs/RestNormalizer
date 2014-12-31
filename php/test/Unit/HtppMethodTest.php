<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class HtppMethodTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HtppMethodTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveGET()
    {
        $this->assertSame(HttpMethod::GET, HttpMethod::GET()->getValue());
    }

    public function testShouldHaveHEAD()
    {
        $this->assertSame(HttpMethod::HEAD, HttpMethod::HEAD()->getValue());
    }

    public function testShouldHavePOST()
    {
        $this->assertSame(HttpMethod::POST, HttpMethod::POST()->getValue());
    }

    public function testShouldHavePUT()
    {
        $this->assertSame(HttpMethod::PUT, HttpMethod::PUT()->getValue());
    }

    public function testShouldHavePATCH()
    {
        $this->assertSame(HttpMethod::PATCH, HttpMethod::PATCH()->getValue());
    }

    public function testShouldHaveDELETE()
    {
        $this->assertSame(HttpMethod::DELETE, HttpMethod::DELETE()->getValue());
    }
} 