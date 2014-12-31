<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Unit;

use Crak\Component\RestNormalizer\HttpCode;

/**
 * Class HtppCodeTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class HtppCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldHaveACODE_100()
    {
        $this->assertSame(HttpCode::CODE_100, HttpCode::CODE_100()->getValue());
    }

    public function testShouldHaveACODE_101()
    {
        $this->assertSame(HttpCode::CODE_101, HttpCode::CODE_101()->getValue());
    }

    public function testShouldHaveACODE_200()
    {
        $this->assertSame(HttpCode::CODE_200, HttpCode::CODE_200()->getValue());
    }

    public function testShouldHaveACODE_201()
    {
        $this->assertSame(HttpCode::CODE_201, HttpCode::CODE_201()->getValue());
    }

    public function testShouldHaveACODE_202()
    {
        $this->assertSame(HttpCode::CODE_202, HttpCode::CODE_202()->getValue());
    }

    public function testShouldHaveACODE_203()
    {
        $this->assertSame(HttpCode::CODE_203, HttpCode::CODE_203()->getValue());
    }

    public function testShouldHaveACODE_204()
    {
        $this->assertSame(HttpCode::CODE_204, HttpCode::CODE_204()->getValue());
    }

    public function testShouldHaveACODE_205()
    {
        $this->assertSame(HttpCode::CODE_205, HttpCode::CODE_205()->getValue());
    }

    public function testShouldHaveACODE_206()
    {
        $this->assertSame(HttpCode::CODE_206, HttpCode::CODE_206()->getValue());
    }

    public function testShouldHaveACODE_300()
    {
        $this->assertSame(HttpCode::CODE_300, HttpCode::CODE_300()->getValue());
    }

    public function testShouldHaveACODE_301()
    {
        $this->assertSame(HttpCode::CODE_301, HttpCode::CODE_301()->getValue());
    }

    public function testShouldHaveACODE_302()
    {
        $this->assertSame(HttpCode::CODE_302, HttpCode::CODE_302()->getValue());
    }

    public function testShouldHaveACODE_303()
    {
        $this->assertSame(HttpCode::CODE_303, HttpCode::CODE_303()->getValue());
    }

    public function testShouldHaveACODE_304()
    {
        $this->assertSame(HttpCode::CODE_304, HttpCode::CODE_304()->getValue());
    }

    public function testShouldHaveACODE_305()
    {
        $this->assertSame(HttpCode::CODE_305, HttpCode::CODE_305()->getValue());
    }

    public function testShouldHaveACODE_400()
    {
        $this->assertSame(HttpCode::CODE_400, HttpCode::CODE_400()->getValue());
    }

    public function testShouldHaveACODE_401()
    {
        $this->assertSame(HttpCode::CODE_401, HttpCode::CODE_401()->getValue());
    }

    public function testShouldHaveACODE_402()
    {
        $this->assertSame(HttpCode::CODE_402, HttpCode::CODE_402()->getValue());
    }

    public function testShouldHaveACODE_403()
    {
        $this->assertSame(HttpCode::CODE_403, HttpCode::CODE_403()->getValue());
    }

    public function testShouldHaveACODE_404()
    {
        $this->assertSame(HttpCode::CODE_404, HttpCode::CODE_404()->getValue());
    }

    public function testShouldHaveACODE_405()
    {
        $this->assertSame(HttpCode::CODE_405, HttpCode::CODE_405()->getValue());
    }

    public function testShouldHaveACODE_406()
    {
        $this->assertSame(HttpCode::CODE_406, HttpCode::CODE_406()->getValue());
    }

    public function testShouldHaveACODE_407()
    {
        $this->assertSame(HttpCode::CODE_407, HttpCode::CODE_407()->getValue());
    }

    public function testShouldHaveACODE_408()
    {
        $this->assertSame(HttpCode::CODE_408, HttpCode::CODE_408()->getValue());
    }

    public function testShouldHaveACODE_409()
    {
        $this->assertSame(HttpCode::CODE_409, HttpCode::CODE_409()->getValue());
    }

    public function testShouldHaveACODE_410()
    {
        $this->assertSame(HttpCode::CODE_410, HttpCode::CODE_410()->getValue());
    }

    public function testShouldHaveACODE_411()
    {
        $this->assertSame(HttpCode::CODE_411, HttpCode::CODE_411()->getValue());
    }

    public function testShouldHaveACODE_412()
    {
        $this->assertSame(HttpCode::CODE_412, HttpCode::CODE_412()->getValue());
    }

    public function testShouldHaveACODE_413()
    {
        $this->assertSame(HttpCode::CODE_413, HttpCode::CODE_413()->getValue());
    }

    public function testShouldHaveACODE_414()
    {
        $this->assertSame(HttpCode::CODE_414, HttpCode::CODE_414()->getValue());
    }

    public function testShouldHaveACODE_415()
    {
        $this->assertSame(HttpCode::CODE_415, HttpCode::CODE_415()->getValue());
    }

    public function testShouldHaveACODE_500()
    {
        $this->assertSame(HttpCode::CODE_500, HttpCode::CODE_500()->getValue());
    }

    public function testShouldHaveACODE_501()
    {
        $this->assertSame(HttpCode::CODE_501, HttpCode::CODE_501()->getValue());
    }

    public function testShouldHaveACODE_502()
    {
        $this->assertSame(HttpCode::CODE_502, HttpCode::CODE_502()->getValue());
    }

    public function testShouldHaveACODE_503()
    {
        $this->assertSame(HttpCode::CODE_503, HttpCode::CODE_503()->getValue());
    }

    public function testShouldHaveACODE_504()
    {
        $this->assertSame(HttpCode::CODE_504, HttpCode::CODE_504()->getValue());
    }

    public function testShouldHaveACODE_505()
    {
        $this->assertSame(HttpCode::CODE_505, HttpCode::CODE_505()->getValue());
    }
} 