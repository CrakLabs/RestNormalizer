<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\DataBuilder;
use Crak\Component\RestNormalizer\Builder\Data\ResponseDataBuilder;
use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class ResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
abstract class AbstractResponseBuilder implements ResponseBuilderInterface
{
    const ABS_RESPONSE_BUILDER_CLASS_NAME = __CLASS__;

    use ResponseBuilderTrait;

    /**
     * @var DataBuilder
     */
    private $dataBuilder;

    /**
     * @param DataBuilder $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     */
    public function __construct(DataBuilder $dataBuilder, NonEmptyString $apiVersion, HttpMethod $httpMethod)
    {
        $this->initBuilder($apiVersion, $httpMethod);
        $this->dataBuilder = $dataBuilder;
    }

    /**
     * @return DataBuilder
     */
    public function getDataBuilder()
    {
        return $this->dataBuilder;
    }
}
