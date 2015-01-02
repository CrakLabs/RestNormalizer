<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\ParameterInterface;


/**
 * Class ResponseBuilderTrait
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
trait ResponseBuilderTrait
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
     * @var ParameterCollection
     */
    private $parameters;

    /**
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     */
    protected function initBuilder(NonEmptyString $apiVersion, HttpMethod $httpMethod)
    {
        $this->apiVersion = $apiVersion;
        $this->httpMethod = $httpMethod;
        $this->parameters = new ParameterCollection();
    }

    /**
     * @inheritdoc
     */
    public function addParameter(ParameterInterface $parameter)
    {
        $this->parameters->add($parameter);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addParameters(ParameterCollection $parameters)
    {
        foreach ($parameters as $parameter) {
            $this->parameters->add($parameter);
        }
        return $this;
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

    /**
     * @inheritdoc
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}