<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer\Test\Mock;

use Crak\Component\RestNormalizer\Parameter;

/**
 * Class SampleUnitTest
 * @package Crak\Component\RestNormalizer\Test\Mock
 * @author bcolucci <bcolucci@crakmedia.com>
 */
trait SampleAssertsTrait
{
    /**
     * @param mixed $obj
     */
    private function assertInstanceOfSampleClass($obj)
    {
        $this->assertInstanceOf(Parameter::CLASS_NAME, $obj);
    }
} 