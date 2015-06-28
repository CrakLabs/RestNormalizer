<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\DataBuilderInterface;
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
     * @var DataBuilderInterface
     */
    private $dataBuilder;

    /**
     * @param DataBuilderInterface $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     */
    public function __construct(DataBuilderInterface $dataBuilder, NonEmptyString $apiVersion, HttpMethod $httpMethod)
    {
        $this->initBuilder($apiVersion, $httpMethod);
        $this->dataBuilder = $dataBuilder;
    }

    /**
     * @return DataBuilderInterface
     */
    public function getDataBuilder()
    {
        return $this->dataBuilder;
    }
}