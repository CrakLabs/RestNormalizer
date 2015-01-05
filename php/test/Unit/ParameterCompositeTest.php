<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Bcol\Component\Type\String;
use Crak\Component\RestNormalizer\ParameterComposite;

/**
 * Class ParameterCompositeTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ParameterCompositeTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveAnId()
    {
        $parameter = ParameterComposite::create('programIds');
        $this->assertSame('programIds', $parameter->getId()->getValue());
    }

    public function testShouldContainsParameters()
    {
        $parameter = ParameterComposite::create('programIds', ['1', '2']);
        $parameter
            ->addValue(new String('3'))
            ->addValue(new String('4'));

        $this->assertSame('["1","2","3","4"]', json_encode($parameter->getValue()));

        $this->assertCount(4, $parameter);

        $parameter = ParameterComposite::create('programIds');
        $this->assertSame('[]', json_encode($parameter->getValue()));
    }
} 