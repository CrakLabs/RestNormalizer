<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;

/**
 * Class HttpMethod
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HttpMethod
{
    const CLASS_NAME = __CLASS__;

    const GET = 'GET';
    const HEAD = 'HEAD';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';

    /**
     * @var NonEmptyString
     */
    private $value;

    /**
     * @param string $method
     * @throws \InvalidArgumentException
     * @codeCoverageIgnore
     */
    private function __construct($method)
    {
        if (!in_array($method, self::getAvailableMethods())) {
            throw new \InvalidArgumentException('Invalid HttpMethod: ' . $method);
        }
        $this->value = $method;
    }

    /**
     * @return NonEmptyString
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public static function getAvailableMethods()
    {
        return array_reverse((new \ReflectionClass(__CLASS__))->getConstants());
    }

    /**
     * @param string $method
     * @return HttpMethod|null
     */
    public static function valueOf($method)
    {
        $methods = self::getAvailableMethods();
        $idx = array_search($method, $methods);
        if ($idx === false) {
            return null;
        }
        return self::$idx();
    }

    /**
     * @return HttpMethod
     */
    public static function GET()
    {
        return new self(self::GET);
    }

    /**
     * @return HttpMethod
     */
    public static function HEAD()
    {
        return new self(self::HEAD);
    }

    /**
     * @return HttpMethod
     */
    public static function POST()
    {
        return new self(self::POST);
    }

    /**
     * @return HttpMethod
     */
    public static function PUT()
    {
        return new self(self::PUT);
    }

    /**
     * @return HttpMethod
     */
    public static function PATCH()
    {
        return new self(self::PATCH);
    }

    /**
     * @return HttpMethod
     */
    public static function DELETE()
    {
        return new self(self::DELETE);
    }
} 
