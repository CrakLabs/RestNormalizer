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
        $this->assertSame(HttpSuccessCode::CODE_100, HttpSuccessCode::CODE_100()->getValue());
    }

    public function testShouldHaveACODE_101()
    {
        $this->assertSame(HttpSuccessCode::CODE_101, HttpSuccessCode::CODE_101()->getValue());
    }

    public function testShouldHaveACODE_200()
    {
        $this->assertSame(HttpSuccessCode::CODE_200, HttpSuccessCode::CODE_200()->getValue());
    }

    public function testShouldHaveACODE_201()
    {
        $this->assertSame(HttpSuccessCode::CODE_201, HttpSuccessCode::CODE_201()->getValue());
    }

    public function testShouldHaveACODE_202()
    {
        $this->assertSame(HttpSuccessCode::CODE_202, HttpSuccessCode::CODE_202()->getValue());
    }

    public function testShouldHaveACODE_203()
    {
        $this->assertSame(HttpSuccessCode::CODE_203, HttpSuccessCode::CODE_203()->getValue());
    }

    public function testShouldHaveACODE_204()
    {
        $this->assertSame(HttpSuccessCode::CODE_204, HttpSuccessCode::CODE_204()->getValue());
    }

    public function testShouldHaveACODE_205()
    {
        $this->assertSame(HttpSuccessCode::CODE_205, HttpSuccessCode::CODE_205()->getValue());
    }

    public function testShouldHaveACODE_206()
    {
        $this->assertSame(HttpSuccessCode::CODE_206, HttpSuccessCode::CODE_206()->getValue());
    }

    public function testShouldHaveACODE_300()
    {
        $this->assertSame(HttpSuccessCode::CODE_300, HttpSuccessCode::CODE_300()->getValue());
    }

    public function testShouldHaveACODE_301()
    {
        $this->assertSame(HttpSuccessCode::CODE_301, HttpSuccessCode::CODE_301()->getValue());
    }

    public function testShouldHaveACODE_302()
    {
        $this->assertSame(HttpSuccessCode::CODE_302, HttpSuccessCode::CODE_302()->getValue());
    }

    public function testShouldHaveACODE_303()
    {
        $this->assertSame(HttpSuccessCode::CODE_303, HttpSuccessCode::CODE_303()->getValue());
    }

    public function testShouldHaveACODE_304()
    {
        $this->assertSame(HttpSuccessCode::CODE_304, HttpSuccessCode::CODE_304()->getValue());
    }

    public function testShouldHaveACODE_305()
    {
        $this->assertSame(HttpSuccessCode::CODE_305, HttpSuccessCode::CODE_305()->getValue());
    }

    public function testShouldHaveACODE_400()
    {
        $this->assertSame(HttpErrorCode::CODE_400, HttpErrorCode::CODE_400()->getValue());
    }

    public function testShouldHaveACODE_401()
    {
        $this->assertSame(HttpErrorCode::CODE_401, HttpErrorCode::CODE_401()->getValue());
    }

    public function testShouldHaveACODE_402()
    {
        $this->assertSame(HttpErrorCode::CODE_402, HttpErrorCode::CODE_402()->getValue());
    }

    public function testShouldHaveACODE_403()
    {
        $this->assertSame(HttpErrorCode::CODE_403, HttpErrorCode::CODE_403()->getValue());
    }

    public function testShouldHaveACODE_404()
    {
        $this->assertSame(HttpErrorCode::CODE_404, HttpErrorCode::CODE_404()->getValue());
    }

    public function testShouldHaveACODE_405()
    {
        $this->assertSame(HttpErrorCode::CODE_405, HttpErrorCode::CODE_405()->getValue());
    }

    public function testShouldHaveACODE_406()
    {
        $this->assertSame(HttpErrorCode::CODE_406, HttpErrorCode::CODE_406()->getValue());
    }

    public function testShouldHaveACODE_407()
    {
        $this->assertSame(HttpErrorCode::CODE_407, HttpErrorCode::CODE_407()->getValue());
    }

    public function testShouldHaveACODE_408()
    {
        $this->assertSame(HttpErrorCode::CODE_408, HttpErrorCode::CODE_408()->getValue());
    }

    public function testShouldHaveACODE_409()
    {
        $this->assertSame(HttpErrorCode::CODE_409, HttpErrorCode::CODE_409()->getValue());
    }

    public function testShouldHaveACODE_410()
    {
        $this->assertSame(HttpErrorCode::CODE_410, HttpErrorCode::CODE_410()->getValue());
    }

    public function testShouldHaveACODE_411()
    {
        $this->assertSame(HttpErrorCode::CODE_411, HttpErrorCode::CODE_411()->getValue());
    }

    public function testShouldHaveACODE_412()
    {
        $this->assertSame(HttpErrorCode::CODE_412, HttpErrorCode::CODE_412()->getValue());
    }

    public function testShouldHaveACODE_413()
    {
        $this->assertSame(HttpErrorCode::CODE_413, HttpErrorCode::CODE_413()->getValue());
    }

    public function testShouldHaveACODE_414()
    {
        $this->assertSame(HttpErrorCode::CODE_414, HttpErrorCode::CODE_414()->getValue());
    }

    public function testShouldHaveACODE_415()
    {
        $this->assertSame(HttpErrorCode::CODE_415, HttpErrorCode::CODE_415()->getValue());
    }

    public function testShouldHaveACODE_500()
    {
        $this->assertSame(HttpErrorCode::CODE_500, HttpErrorCode::CODE_500()->getValue());
    }

    public function testShouldHaveACODE_501()
    {
        $this->assertSame(HttpErrorCode::CODE_501, HttpErrorCode::CODE_501()->getValue());
    }

    public function testShouldHaveACODE_502()
    {
        $this->assertSame(HttpErrorCode::CODE_502, HttpErrorCode::CODE_502()->getValue());
    }

    public function testShouldHaveACODE_503()
    {
        $this->assertSame(HttpErrorCode::CODE_503, HttpErrorCode::CODE_503()->getValue());
    }

    public function testShouldHaveACODE_504()
    {
        $this->assertSame(HttpErrorCode::CODE_504, HttpErrorCode::CODE_504()->getValue());
    }

    public function testShouldHaveACODE_505()
    {
        $this->assertSame(HttpErrorCode::CODE_505, HttpErrorCode::CODE_505()->getValue());
    }
}