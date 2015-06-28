<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

/**
 * Class HttpSuccessCode
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HttpSuccessCode implements HttpCode
{
    const CLASS_NAME = __CLASS__;

    const CODE_100 = 100;
    const CODE_101 = 101;
    const CODE_200 = 200;
    const CODE_201 = 201;
    const CODE_202 = 202;
    const CODE_203 = 203;
    const CODE_204 = 204;
    const CODE_205 = 205;
    const CODE_206 = 206;
    const CODE_300 = 300;
    const CODE_301 = 301;
    const CODE_302 = 302;
    const CODE_303 = 303;
    const CODE_304 = 304;
    const CODE_305 = 305;

    /**
     * @var int
     */
    private $value;

    /**
     * @param int $code
     * @throws \InvalidArgumentException
     * @codeCoverageIgnore
     */
    private function __construct($code)
    {
        if (!in_array($code, self::getAvailableCodes())) {
            throw new \InvalidArgumentException('Invalid HttpCode: ' . $code);
        }
        $this->value = $code;
    }

    /**
     * @inheritdoc
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public static function getAvailableCodes()
    {
        return array_reverse((new \ReflectionClass(__CLASS__))->getConstants());
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_100()
    {
        return new self(self::CODE_100);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_101()
    {
        return new self(self::CODE_101);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_200()
    {
        return new self(self::CODE_200);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_201()
    {
        return new self(self::CODE_201);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_202()
    {
        return new self(self::CODE_202);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_203()
    {
        return new self(self::CODE_203);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_204()
    {
        return new self(self::CODE_204);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_205()
    {
        return new self(self::CODE_205);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_206()
    {
        return new self(self::CODE_206);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_300()
    {
        return new self(self::CODE_300);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_301()
    {
        return new self(self::CODE_301);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_302()
    {
        return new self(self::CODE_302);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_303()
    {
        return new self(self::CODE_303);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_304()
    {
        return new self(self::CODE_304);
    }

    /**
     * @return HttpSuccessCode
     */
    public static function CODE_305()
    {
        return new self(self::CODE_305);
    }
} 
