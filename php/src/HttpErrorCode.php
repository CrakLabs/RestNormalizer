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
class HttpErrorCode implements HttpCodeInterface
{
    const CLASS_NAME = __CLASS__;

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
     * @param int $code
     * @return HttpErrorCode|null
     */
    public static function valueOf($code)
    {
        $codes = self::getAvailableCodes();
        $idx = array_search($code, $codes);
        if ($idx === false) {
            return null;
        }
        $idx = str_replace('_','', $idx);
        $idx = strtolower($idx);

        return self::$idx();
    }

    /**
     * @return HttpErrorCode
     */
    public static function code400()
    {
        return new self(self::CODE_400);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code401()
    {
        return new self(self::CODE_401);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code402()
    {
        return new self(self::CODE_402);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code403()
    {
        return new self(self::CODE_403);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code404()
    {
        return new self(self::CODE_404);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code405()
    {
        return new self(self::CODE_405);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code406()
    {
        return new self(self::CODE_406);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code407()
    {
        return new self(self::CODE_407);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code408()
    {
        return new self(self::CODE_408);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code409()
    {
        return new self(self::CODE_409);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code410()
    {
        return new self(self::CODE_410);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code411()
    {
        return new self(self::CODE_411);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code412()
    {
        return new self(self::CODE_412);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code413()
    {
        return new self(self::CODE_413);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code414()
    {
        return new self(self::CODE_414);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code415()
    {
        return new self(self::CODE_415);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code500()
    {
        return new self(self::CODE_500);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code501()
    {
        return new self(self::CODE_501);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code502()
    {
        return new self(self::CODE_502);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code503()
    {
        return new self(self::CODE_503);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code504()
    {
        return new self(self::CODE_504);
    }

    /**
     * @return HttpErrorCode
     */
    public static function code505()
    {
        return new self(self::CODE_505);
    }
} 
