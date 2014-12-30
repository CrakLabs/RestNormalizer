<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class ResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
abstract class ResponseBuilder implements ResponseBuilderInterface
{
    /**
     * @var NonEmptyString
     */
    private $apiVersion;

    /**
     * @var HttpMethod
     */
    private $httpMethod;

    /**
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     */
    public function __construct(NonEmptyString $apiVersion, HttpMethod $httpMethod)
    {
        $this->apiVersion = $apiVersion;
        $this->httpMethod = $httpMethod;
    }

    /**
     * @return NonEmptyString
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @return HttpMethod
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }
}