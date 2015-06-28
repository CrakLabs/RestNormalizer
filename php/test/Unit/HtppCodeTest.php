<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpSuccessCode;

/**
 * Class HtppCodeTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HtppCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveACODE_100()
    {
        $this->assertSame(HttpSuccessCode::CODE_100, HttpSuccessCode::code100()->getValue());
    }

    public function testShouldHaveACODE_101()
    {
        $this->assertSame(HttpSuccessCode::CODE_101, HttpSuccessCode::code101()->getValue());
    }

    public function testShouldHaveACODE_200()
    {
        $this->assertSame(HttpSuccessCode::CODE_200, HttpSuccessCode::code200()->getValue());
    }

    public function testShouldHaveACODE_201()
    {
        $this->assertSame(HttpSuccessCode::CODE_201, HttpSuccessCode::code201()->getValue());
    }

    public function testShouldHaveACODE_202()
    {
        $this->assertSame(HttpSuccessCode::CODE_202, HttpSuccessCode::code202()->getValue());
    }

    public function testShouldHaveACODE_203()
    {
        $this->assertSame(HttpSuccessCode::CODE_203, HttpSuccessCode::code203()->getValue());
    }

    public function testShouldHaveACODE_204()
    {
        $this->assertSame(HttpSuccessCode::CODE_204, HttpSuccessCode::code204()->getValue());
    }

    public function testShouldHaveACODE_205()
    {
        $this->assertSame(HttpSuccessCode::CODE_205, HttpSuccessCode::code205()->getValue());
    }

    public function testShouldHaveACODE_206()
    {
        $this->assertSame(HttpSuccessCode::CODE_206, HttpSuccessCode::code206()->getValue());
    }

    public function testShouldHaveACODE_300()
    {
        $this->assertSame(HttpSuccessCode::CODE_300, HttpSuccessCode::code300()->getValue());
    }

    public function testShouldHaveACODE_301()
    {
        $this->assertSame(HttpSuccessCode::CODE_301, HttpSuccessCode::code301()->getValue());
    }

    public function testShouldHaveACODE_302()
    {
        $this->assertSame(HttpSuccessCode::CODE_302, HttpSuccessCode::code302()->getValue());
    }

    public function testShouldHaveACODE_303()
    {
        $this->assertSame(HttpSuccessCode::CODE_303, HttpSuccessCode::code303()->getValue());
    }

    public function testShouldHaveACODE_304()
    {
        $this->assertSame(HttpSuccessCode::CODE_304, HttpSuccessCode::code304()->getValue());
    }

    public function testShouldHaveACODE_305()
    {
        $this->assertSame(HttpSuccessCode::CODE_305, HttpSuccessCode::code305()->getValue());
    }

    public function testShouldHaveACODE_400()
    {
        $this->assertSame(HttpErrorCode::CODE_400, HttpErrorCode::code400()->getValue());
    }

    public function testShouldHaveACODE_401()
    {
        $this->assertSame(HttpErrorCode::CODE_401, HttpErrorCode::code401()->getValue());
    }

    public function testShouldHaveACODE_402()
    {
        $this->assertSame(HttpErrorCode::CODE_402, HttpErrorCode::code402()->getValue());
    }

    public function testShouldHaveACODE_403()
    {
        $this->assertSame(HttpErrorCode::CODE_403, HttpErrorCode::code403()->getValue());
    }

    public function testShouldHaveACODE_404()
    {
        $this->assertSame(HttpErrorCode::CODE_404, HttpErrorCode::code404()->getValue());
    }

    public function testShouldHaveACODE_405()
    {
        $this->assertSame(HttpErrorCode::CODE_405, HttpErrorCode::code405()->getValue());
    }

    public function testShouldHaveACODE_406()
    {
        $this->assertSame(HttpErrorCode::CODE_406, HttpErrorCode::code406()->getValue());
    }

    public function testShouldHaveACODE_407()
    {
        $this->assertSame(HttpErrorCode::CODE_407, HttpErrorCode::code407()->getValue());
    }

    public function testShouldHaveACODE_408()
    {
        $this->assertSame(HttpErrorCode::CODE_408, HttpErrorCode::code408()->getValue());
    }

    public function testShouldHaveACODE_409()
    {
        $this->assertSame(HttpErrorCode::CODE_409, HttpErrorCode::code409()->getValue());
    }

    public function testShouldHaveACODE_410()
    {
        $this->assertSame(HttpErrorCode::CODE_410, HttpErrorCode::code410()->getValue());
    }

    public function testShouldHaveACODE_411()
    {
        $this->assertSame(HttpErrorCode::CODE_411, HttpErrorCode::code411()->getValue());
    }

    public function testShouldHaveACODE_412()
    {
        $this->assertSame(HttpErrorCode::CODE_412, HttpErrorCode::code412()->getValue());
    }

    public function testShouldHaveACODE_413()
    {
        $this->assertSame(HttpErrorCode::CODE_413, HttpErrorCode::code413()->getValue());
    }

    public function testShouldHaveACODE_414()
    {
        $this->assertSame(HttpErrorCode::CODE_414, HttpErrorCode::code414()->getValue());
    }

    public function testShouldHaveACODE_415()
    {
        $this->assertSame(HttpErrorCode::CODE_415, HttpErrorCode::code415()->getValue());
    }

    public function testShouldHaveACODE_500()
    {
        $this->assertSame(HttpErrorCode::CODE_500, HttpErrorCode::code500()->getValue());
    }

    public function testShouldHaveACODE_501()
    {
        $this->assertSame(HttpErrorCode::CODE_501, HttpErrorCode::code501()->getValue());
    }

    public function testShouldHaveACODE_502()
    {
        $this->assertSame(HttpErrorCode::CODE_502, HttpErrorCode::code502()->getValue());
    }

    public function testShouldHaveACODE_503()
    {
        $this->assertSame(HttpErrorCode::CODE_503, HttpErrorCode::code503()->getValue());
    }

    public function testShouldHaveACODE_504()
    {
        $this->assertSame(HttpErrorCode::CODE_504, HttpErrorCode::code504()->getValue());
    }

    public function testShouldHaveACODE_505()
    {
        $this->assertSame(HttpErrorCode::CODE_505, HttpErrorCode::code505()->getValue());
    }
}