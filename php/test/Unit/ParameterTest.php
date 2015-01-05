<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\Parameter;

/**
 * Class ParameterTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Parameter
     */
    private $parameter;

    public function setUp()
    {
        $this->parameter = Parameter::create("id", "value");
    }

    public function testShouldHaveAnId()
    {
        $this->assertSame("id", $this->parameter->getId()->getValue());
    }

    public function testShouldHaveValues()
    {
        $this->assertSame("value", $this->parameter->getValues()->first()->getValue());
    }

    public function testValueIsOptional()
    {
        $this->assertSame([], Parameter::create("id")->getValues()->toArray());
    }
} 