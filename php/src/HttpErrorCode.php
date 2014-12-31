<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

/**
 * Class HttpErrorCode
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HttpErrorCode implements HttpCode
{
    const CLASS_NAME = __CLASS__;

    const CODE_NONE = 0;

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
     * @return HttpErrorCode
     */
    public static function CODE_NONE()
    {
        return new self(self::CODE_NONE);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_400()
    {
        return new self(self::CODE_400);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_401()
    {
        return new self(self::CODE_401);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_402()
    {
        return new self(self::CODE_402);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_403()
    {
        return new self(self::CODE_403);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_404()
    {
        return new self(self::CODE_404);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_405()
    {
        return new self(self::CODE_405);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_406()
    {
        return new self(self::CODE_406);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_407()
    {
        return new self(self::CODE_407);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_408()
    {
        return new self(self::CODE_408);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_409()
    {
        return new self(self::CODE_409);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_410()
    {
        return new self(self::CODE_410);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_411()
    {
        return new self(self::CODE_411);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_412()
    {
        return new self(self::CODE_412);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_413()
    {
        return new self(self::CODE_413);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_414()
    {
        return new self(self::CODE_414);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_415()
    {
        return new self(self::CODE_415);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_500()
    {
        return new self(self::CODE_500);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_501()
    {
        return new self(self::CODE_501);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_502()
    {
        return new self(self::CODE_502);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_503()
    {
        return new self(self::CODE_503);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_504()
    {
        return new self(self::CODE_504);
    }

    /**
     * @return HttpErrorCode
     */
    public static function CODE_505()
    {
        return new self(self::CODE_505);
    }
} 