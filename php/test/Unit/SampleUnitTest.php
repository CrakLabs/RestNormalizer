<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\SampleClass;
use Crak\Component\RestNormalizer\Test\Mock\SampleAssertsTrait;

/**
 * Class SampleUnitTest
 * @package Crak\Component\RestNormalizer\Test\Unit
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class SampleUnitTest extends \PHPUnit_Framework_TestCase
{
    use SampleAssertsTrait;

    public function testShouldSayHelloToMe()
    {
        $obj = new SampleClass();

        $this->assertInstanceOfSampleClass($obj);
        $this->assertSame('Hello, brice!', $obj->sayHello('brice'));
    }
} 