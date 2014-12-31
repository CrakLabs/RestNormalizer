<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\StrictPositiveInteger;

/**
 * Class HttpCode
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HttpCode
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
    const CODE_400 = 400;
    const CODE_401 = 401;
    const CODE_402 = 402;
    const CODE_403 = 403;
    const CODE_404 = 404;
    const CODE_405 = 405;
    const CODE_406 = 406;
    const CODE_407 = 407;
    const CODE_408 = 408;
    const CODE_409 = 409;
    const CODE_410 = 410;
    const CODE_411 = 411;
    const CODE_412 = 412;
    const CODE_413 = 413;
    const CODE_414 = 414;
    const CODE_415 = 415;
    const CODE_500 = 500;
    const CODE_501 = 501;
    const CODE_502 = 502;
    const CODE_503 = 503;
    const CODE_504 = 504;
    const CODE_505 = 505;

    /**
     * @var StrictPositiveInteger
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
     * @return StrictPositiveInteger
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
     * @return HttpCode
     */
    public static function CODE_100()
    {
        return new self(self::CODE_100);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_101()
    {
        return new self(self::CODE_101);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_200()
    {
        return new self(self::CODE_200);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_201()
    {
        return new self(self::CODE_201);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_202()
    {
        return new self(self::CODE_202);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_203()
    {
        return new self(self::CODE_203);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_204()
    {
        return new self(self::CODE_204);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_205()
    {
        return new self(self::CODE_205);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_206()
    {
        return new self(self::CODE_206);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_300()
    {
        return new self(self::CODE_300);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_301()
    {
        return new self(self::CODE_301);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_302()
    {
        return new self(self::CODE_302);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_303()
    {
        return new self(self::CODE_303);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_304()
    {
        return new self(self::CODE_304);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_305()
    {
        return new self(self::CODE_305);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_400()
    {
        return new self(self::CODE_400);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_401()
    {
        return new self(self::CODE_401);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_402()
    {
        return new self(self::CODE_402);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_403()
    {
        return new self(self::CODE_403);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_404()
    {
        return new self(self::CODE_404);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_405()
    {
        return new self(self::CODE_405);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_406()
    {
        return new self(self::CODE_406);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_407()
    {
        return new self(self::CODE_407);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_408()
    {
        return new self(self::CODE_408);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_409()
    {
        return new self(self::CODE_409);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_410()
    {
        return new self(self::CODE_410);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_411()
    {
        return new self(self::CODE_411);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_412()
    {
        return new self(self::CODE_412);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_413()
    {
        return new self(self::CODE_413);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_414()
    {
        return new self(self::CODE_414);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_415()
    {
        return new self(self::CODE_415);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_500()
    {
        return new self(self::CODE_500);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_501()
    {
        return new self(self::CODE_501);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_502()
    {
        return new self(self::CODE_502);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_503()
    {
        return new self(self::CODE_503);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_504()
    {
        return new self(self::CODE_504);
    }

    /**
     * @return HttpCode
     */
    public static function CODE_505()
    {
        return new self(self::CODE_505);
    }
} 