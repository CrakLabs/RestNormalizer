<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

/**
 * Class SampleClass
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class SampleClass
{
    const CLASS_NAME = __CLASS__;

    /**
     * @param string $name
     * @return string
     */
    public function sayHello($name)
    {
        return sprintf('Hello, %s!', $name);
    }
} 