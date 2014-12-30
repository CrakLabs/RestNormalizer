<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Factory;

use Crak\Component\RestNormalizer\Builder\Data\ErrorDataBuilder;
use Crak\Component\RestNormalizer\Builder\Data\ResponseDataBuilder;
use Crak\Component\RestNormalizer\Builder\Data\SuccessDataBuilder;

/**
 * Class ResponseDataBuilderFactory
 * @package Crak\Component\RestNormalizer\Factory
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class ResponseDataBuilderFactory
{
    private function __construct()
    {
    }

    /**
     * @return ResponseDataBuilder
     */
    public static function create()
    {
        return new ResponseDataBuilder(new SuccessDataBuilder(), new ErrorDataBuilder());
    }
} 